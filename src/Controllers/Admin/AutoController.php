<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Models\Auto;
use App\Utils\DatatablesHelper;
use Ozdemir\Datatables\Datatables;

class AutoController extends AdminController
{
    public function index($request, $response, $args)
    {
        $table_config['total_column'] = array(
            'id' => 'ID',
            'datetime' => 'time', 'type' => 'type', 'value' => 'content'
        );
        $table_config['default_show_column'] = array(
            'op', 'id',
            'datetime', 'type', 'value'
        );
        $table_config['ajax_url'] = 'auto/ajax';
        return $this->view()->assign('table_config', $table_config)->display('admin/auto/index.tpl');
    }

    public function create($request, $response, $args)
    {
        return $this->view()->display('admin/auto/add.tpl');
    }

    public function add($request, $response, $args)
    {
        $auto = new Auto();
        $auto->datetime = time();
        $auto->value = $request->getParam('content');
        $auto->sign = $request->getParam('sign');
        $auto->type = 1;

        if (!$auto->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = 'Failed to add';
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = 'Added successfully';
        return $response->getBody()->write(json_encode($rs));
    }

    public function delete($request, $response, $args)
    {
        $id = $request->getParam('id');
        $auto = Auto::find($id);
        if (!$auto->delete()) {
            $rs['ret'] = 0;
            $rs['msg'] = 'Delete failed';
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = 'Deleted successfully';
        return $response->getBody()->write(json_encode($rs));
    }

    public function ajax($request, $response, $args)
    {
        $datatables = new Datatables(new DatatablesHelper());
        $datatables->query('Select id,datetime,type,value from auto');

        $datatables->edit('datetime', static function ($data) {
            return date('Y-m-d H:i:s', $data['datetime']);
        });

        $datatables->edit('type', static function ($data) {
            return $data['type'] == 1 ? 'Command issued' : 'Command executed';
        });

        $body = $response->getBody();
        $body->write($datatables->generate());
    }
}
