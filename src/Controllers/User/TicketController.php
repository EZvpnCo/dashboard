<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use App\Models\{
    User,
    Ticket
};
use voku\helper\AntiXSS;
use Slim\Http\{
    Request,
    Response
};
use Psr\Http\Message\ResponseInterface;
use App\Services\MetronSetting;
use App\Metron\MtTelegram;

/**
 *  TicketController
 */
class TicketController extends UserController
{
    /**
     * @param Request   $request
     * @param Response  $response
     * @param array     $args
     */
    public function ticket($request, $response, $args): ?ResponseInterface
    {
        if ($_ENV['enable_ticket'] != true) {
            return null;
        }
        $pageNum = $request->getQueryParams()['page'] ?? 1;
        $tickets = Ticket::where('userid', $this->user->id)->where('rootid', 0)->orderBy('datetime', 'desc')->paginate(15, ['*'], 'page', $pageNum);
        $tickets->setPath('/user/ticket');

        if ($request->getParam('json') == 1) {
            return $response->withJson(
                [
                    'ret'     => 1,
                    'tickets' => $tickets
                ]
            );
        }

        return $response->write(
            $this->view()
                ->assign('tickets', $tickets)
                ->display('user/ticket.tpl')
        );
    }

    /**
     * @param Request   $request
     * @param Response  $response
     * @param array     $args
     */
    public function ticket_create($request, $response, $args): ResponseInterface
    {
        return $response->write(
            $this->view()
                ->display('user/ticket_create.tpl')
        );
    }

    /**
     * @param Request   $request
     * @param Response  $response
     * @param array     $args
     */
    public function ticket_add($request, $response, $args): ResponseInterface
    {
        $title    = $request->getParam('title');
        $content  = $request->getParam('content');
        $markdown = $request->getParam('markdown');

        if ($title == '' || $content == '') {
            return $response->withJson(
                [
                    'ret' => 0,
                    'msg' => 'Failed'
                ]
            );
        }

        if (strpos($content, 'admin') != false || strpos($content, 'user') != false) {
            return $response->withJson(
                [
                    'ret' => 0,
                    'msg' => 'Ticket failed'
                ]
            );
        }

        $ticket  = new Ticket();
        $antiXss = new AntiXSS();

        $ticket->title    = $antiXss->xss_clean($title);
        $ticket->content  = $antiXss->xss_clean($content);
        $ticket->rootid   = 0;
        $ticket->userid   = $this->user->id;
        $ticket->datetime = time();
        $ticket->save();
        if ($_ENV['mail_ticket'] == true) {
            $adminUser = User::where('is_admin', '=', '1')->get();
            foreach ($adminUser as $user) {
                $user->sendMail(
                    $_ENV['appName'] . ' - New ticket',
                    'news/warn.tpl',
                    [
                        'text' => 'New ticket received, Please answer it soon'
                    ],
                    []
                );
            }
        }

        if (MetronSetting::get('Telegram_Ticket') === true) {
            MtTelegram::SendTicket($this->user->id, $title, $content);
        }

        if ($_ENV['useScFtqq'] == true && $markdown != '') {
            $ScFtqq_SCKEY = $_ENV['ScFtqq_SCKEY'];
            $postdata = http_build_query(
                [
                    'text' => $_ENV['appName'] . ' - New ticket',
                    'desp' => $markdown
                ]
            );
            $opts = [
                'http' => [
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => $postdata
                ]
            ];
            $context = stream_context_create($opts);
            file_get_contents('https://sc.ftqq.com/' . $ScFtqq_SCKEY . '.send', false, $context);
        }

        return $response->withJson(
            [
                'ret' => 1,
                'tid' => $ticket->id,
                'msg' => 'Submitted successfully'
            ]
        );
    }

    /**
     * @param Request   $request
     * @param Response  $response
     * @param array     $args
     */
    public function ticket_update($request, $response, $args): ResponseInterface
    {
        $id       = $args['id'];
        $content  = $request->getParam('content');
        $status   = $request->getParam('status');
        $markdown = $request->getParam('markdown');

        if ($content == '' || $status == '') {
            return $response->withJson(
                [
                    'ret' => 0,
                    'msg' => 'Failed'
                ]
            );
        }

        if (strpos($content, 'admin') != false || strpos($content, 'user') != false) {
            return $response->withJson(
                [
                    'ret' => 0,
                    'msg' => 'Ticket failed'
                ]
            );
        }

        $ticket_main = Ticket::where('id', '=', $id)->where('rootid', '=', 0)->first();
        if ($ticket_main->userid != $this->user->id) {
            $newResponse = $response->withStatus(302)->withHeader('Location', '/user/ticket');
            return $newResponse;
        }

        if ($status == 1 && $ticket_main->status != $status) {
            if ($_ENV['mail_ticket'] == true && $markdown != '') {
                $adminUser = User::where('is_admin', '=', '1')->get();
                foreach ($adminUser as $user) {
                    $user->sendMail(
                        $_ENV['appName'] . ' - New answer',
                        'news/warn.tpl',
                        [
                            'text' => 'Administrator, someone re -open<a href="' . $_ENV['baseUrl'] . '/admin/ticket/' . $ticket_main->id . '/view">Ticket</a>，Please answer it in soon :)'
                        ],
                        []
                    );
                }
            }
            if (MetronSetting::get('Telegram_Ticket') === true) {
                MtTelegram::SendTicket($this->user->id, $ticket_main->title, $content, 'restart');
            }
            if ($_ENV['useScFtqq'] == true && $markdown != '') {
                $ScFtqq_SCKEY = $_ENV['ScFtqq_SCKEY'];
                $postdata = http_build_query(
                    [
                        'text' => $_ENV['appName'] . ' - New answer',
                        'desp' => $markdown
                    ]
                );
                $opts = [
                    'http' =>
                    [
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                        'content' => $postdata
                    ]
                ];
                $context = stream_context_create($opts);
                file_get_contents('https://sc.ftqq.com/' . $ScFtqq_SCKEY . '.send', false, $context);
                $useScFtqq = $_ENV['ScFtqq_SCKEY'];
            }
        } else {
            if ($_ENV['mail_ticket'] == true && $markdown != '') {
                $adminUser = User::where('is_admin', '=', '1')->get();
                foreach ($adminUser as $user) {
                    $user->sendMail(
                        $_ENV['appName'] . ' - New answer',
                        'news/warn.tpl',
                        [
                            'text' => 'Administrator, someone responded <a href="' . $_ENV['baseUrl'] . '/admin/ticket/' . $ticket_main->id . '/view">Ticket</a>，Please answer it in soon :)'
                        ],
                        []
                    );
                }
            }
            if (MetronSetting::get('Telegram_Ticket') === true) {
                MtTelegram::SendTicket($this->user->id, $ticket_main->title, $content, 'update');
            }
            if ($_ENV['useScFtqq'] == true && $markdown != '') {
                $ScFtqq_SCKEY = $_ENV['ScFtqq_SCKEY'];
                $postdata = http_build_query(
                    [
                        'text' => $_ENV['appName'] . ' - New answer',
                        'desp' => $markdown
                    ]
                );
                $opts = [
                    'http' =>
                    [
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                        'content' => $postdata
                    ]
                ];
                $context = stream_context_create($opts);
                file_get_contents('https://sc.ftqq.com/' . $ScFtqq_SCKEY . '.send', false, $context);
            }
        }

        $antiXss              = new AntiXSS();

        $ticket               = new Ticket();
        $ticket->title        = $antiXss->xss_clean($ticket_main->title);
        $ticket->content      = $antiXss->xss_clean($content);
        $ticket->rootid       = $ticket_main->id;
        $ticket->userid       = $this->user->id;
        $ticket->datetime     = time();
        $ticket_main->status  = $status;

        $ticket_main->save();
        $ticket->save();

        return $response->withJson(
            [
                'ret' => 1,
                'msg' => 'Submitted successfully'
            ]
        );
    }

    /**
     * @param Request   $request
     * @param Response  $response
     * @param array     $args
     */
    public function ticket_view($request, $response, $args): ResponseInterface
    {
        $id           = $args['id'];
        $ticket_main  = Ticket::where('id', '=', $id)->where('rootid', '=', 0)->first();

        if ($ticket_main->userid != $this->user->id) {
            if ($request->getParam('json') == 1) {
                return $response->withJson(
                    [
                        'ret' => 0,
                        'msg' => 'You do not have access'
                    ]
                );
            }
            $newResponse = $response->withStatus(302)->withHeader('Location', '/user/ticket');
            return $newResponse;
        }

        $pageNum = $request->getQueryParams()['page'] ?? 1;

        $ticketset = Ticket::where('id', $id)->orWhere('rootid', '=', $id)->orderBy('datetime', 'desc')->paginate(5, ['*'], 'page', $pageNum);
        $ticketset->setPath('/user/ticket/' . $id . '/view');

        if ($request->getParam('json') == 1) {
            foreach ($ticketset as $set) {
                $set->username = $set->User()->user_name;
                $set->datetime = $set->datetime();
            }
            return $response->withJson(
                [
                    'ret'     => 1,
                    'tickets' => $ticketset
                ]
            );
        }

        return $response->write(
            $this->view()
                ->assign('title', $ticket_main->title)
                ->assign('ticketset', $ticketset)
                ->assign('id', $id)
                ->display('user/ticket_view.tpl')
        );
    }
}
