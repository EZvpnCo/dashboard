<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Models\{
    Code,
    User
};
use App\Utils\{
    Tools,
    DatatablesHelper
};
use App\Services\Auth;
use Ozdemir\Datatables\Datatables;

class CodeController extends AdminController
{
    public function index($request, $response, $args)
    {
        $table_config['total_column'] = array(
            'id' => 'ID', 'code' => 'content',
            'type' => 'type', 'number' => 'operation',
            'isused' => 'has been used', 'userid' => 'user ID',
            'user_name' => 'username', 'usedatetime' => 'use time'
        );
        $table_config['default_show_column'] = array();
        foreach ($table_config['total_column'] as $column => $value) {
            $table_config['default_show_column'][] = $column;
        }
        $table_config['ajax_url'] = 'code/ajax';
        return $this->view()->assign('table_config', $table_config)->display('admin/code/index.tpl');
    }

    public function create($request, $response, $args)
    {
        return $this->view()->display('admin/code/add.tpl');
    }

    public function donate_create($request, $response, $args)
    {
        return $this->view()->display('admin/code/add_donate.tpl');
    }

    public function add($request, $response, $args)
    {
        $n = $request->getParam('amount');
        $type = $request->getParam('type');
        $number = $request->getParam('number');

        if (Tools::isInt($n) == false) {
            $rs['ret'] = 0;
            $rs['msg'] = 'Illegal request';
            return $response->getBody()->write(json_encode($rs));
        }

        for ($i = 0; $i < $n; $i++) {
            $char = Tools::genRandomChar(32);
            $code = new Code();
            $code->code = time() . $char;
            $code->type = -1;
            $code->number = $number;
            $code->userid = 0;
            $code->usedatetime = '1989:06:04 02:30:00';
            $code->save();
        }

        $rs['ret'] = 1;
        $rs['msg'] = 'Recharge code added successfully';
        return $response->getBody()->write(json_encode($rs));
    }

    public function donate_add($request, $response, $args)
    {
        $amount = $request->getParam('amount');
        $type = $request->getParam('type');
        $text = $request->getParam('code');

        $code = new Code();
        $code->code = $text;
        $code->type = $type;
        $code->number = $amount;
        $code->userid = Auth::getUser()->id;
        $code->isused = 1;
        $code->usedatetime = date('Y:m:d H:i:s');

        $code->save();

        $rs['ret'] = 1;
        $rs['msg'] = 'Added successfully';
        return $response->getBody()->write(json_encode($rs));
    }

    public function ajax_code($request, $response, $args)
    {
        $datatables = new Datatables(new DatatablesHelper());
        $datatables->query('Select code.id,code.code,code.type,code.number,code.isused,code.userid,code.userid as user_name,code.usedatetime from code');

        $datatables->edit('number', static function ($data) {
            switch ($data['type']) {
                case -1:
                    return 'recharge' . $data['number'] . 'yuan';

                case -2:
                    return 'expenditure' . $data['number'] . 'yuan';

                default:
                    return 'obsolete';
            }
        });
        $datatables->edit('isused', static function ($data) {
            return $data['isused'] == 1 ? 'used' : 'unused';
        });

        $datatables->edit('userid', static function ($data) {
            return $data['userid'] == 0 ? 'unused' : $data['userid'];
        });

        $datatables->edit('user_name', static function ($data) {
            $user = User::find($data['user_name']);
            if ($user == null) {
                return 'not used';
            }

            return $user->user_name;
        });

        $datatables->edit('type', static function ($data) {
            switch ($data['type']) {
                case -1:
                    return 'recharge amount';

                case -2:
                    return 'financial expenditure';

                default:
                    return 'obsolete';
            }
        });

        $datatables->edit('usedatetime', static function ($data) {
            return $data['usedatetime'] > '2000-1-1 0:0:0' ? $data['usedatetime'] : 'Unused';
        });

        $body = $response->getBody();
        $body->write($datatables->generate());
    }
}
