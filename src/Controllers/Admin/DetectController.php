<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;
use App\Models\DetectRule;
use App\Utils\{
    Telegram,
    DatatablesHelper
};
use Ozdemir\Datatables\Datatables;

class DetectController extends AdminController
{
    public function index($request, $response, $args)
    {
        $table_config['total_column'] = array(
            'op' => 'operation RRR', 'id' => 'ID', 'name' => 'name',
            'text' => 'introduction', 'regex' => 'regular expression',
            'type' => 'type'
        );
        $table_config['default_show_column'] = array();
        foreach ($table_config['total_column'] as $column => $value) {
            $table_config['default_show_column'][] = $column;
        }
        $table_config['ajax_url'] = 'detect/ajax';
        return $this->view()->assign('table_config', $table_config)->display('admin/detect/index.tpl');
    }

    public function log($request, $response, $args)
    {
        $table_config['total_column'] = array(
            'id' => 'ID', 'user_id' => 'user ID',
            'user_name' => 'username', 'node_id' => 'node ID',
            'node_name' => 'node name', 'rule_id' => 'rule ID',
            'rule_name' => 'rule name', 'rule_text' => 'rule description',
            'rule_regex' => 'rule regular expression', 'rule_type' => 'rule type',
            'datetime' => 'time'
        );
        $table_config['default_show_column'] = array();
        foreach ($table_config['total_column'] as $column => $value) {
            $table_config['default_show_column'][] = $column;
        }
        $table_config['ajax_url'] = 'log/ajax';
        return $this->view()->assign('table_config', $table_config)->display('admin/detect/log.tpl');
    }

    public function create($request, $response, $args)
    {
        return $this->view()->display('admin/detect/add.tpl');
    }

    public function add($request, $response, $args)
    {
        $rule = new DetectRule();
        $rule->name = $request->getParam('name');
        $rule->text = $request->getParam('text');
        $rule->regex = $request->getParam('regex');
        $rule->type = $request->getParam('type');

        if (!$rule->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = 'Failed to add';
            return $response->getBody()->write(json_encode($rs));
        }

        Telegram::SendMarkdown('There is a new audit rule:' . $rule->name);

        $rs['ret'] = 1;
        $rs['msg'] = 'Added successfully';
        return $response->getBody()->write(json_encode($rs));
    }

    public function edit($request, $response, $args)
    {
        $id = $args['id'];
        $rule = DetectRule::find($id);
        return $this->view()->assign('rule', $rule)->display('admin/detect/edit.tpl');
    }

    public function update($request, $response, $args)
    {
        $id = $args['id'];
        $rule = DetectRule::find($id);

        $rule->name = $request->getParam('name');
        $rule->text = $request->getParam('text');
        $rule->regex = $request->getParam('regex');
        $rule->type = $request->getParam('type');

        if (!$rule->save()) {
            $rs['ret'] = 0;
            $rs['msg'] = 'Failed to modify';
            return $response->getBody()->write(json_encode($rs));
        }

        Telegram::SendMarkdown('Rule update:' . PHP_EOL . $request->getParam('name'));

        $rs['ret'] = 1;
        $rs['msg'] = 'Modified successfully';
        return $response->getBody()->write(json_encode($rs));
    }

    public function delete($request, $response, $args)
    {
        $id = $request->getParam('id');
        $rule = DetectRule::find($id);
        if (!$rule->delete()) {
            $rs['ret'] = 0;
            $rs['msg'] = 'Delete failed';
            return $response->getBody()->write(json_encode($rs));
        }
        $rs['ret'] = 1;
        $rs['msg'] = 'Deleted successfully';
        return $response->getBody()->write(json_encode($rs));
    }

    public function ajax_rule($request, $response, $args)
    {
        $datatables = new Datatables(new DatatablesHelper());
        $datatables->query('Select id as op,id,name,text,regex,type from detect_list');

        $datatables->edit('op', static function ($data) {
            return '<a class="btn btn-brand" href="/admin/detect/' . $data['id'] . '/edit">Edit</a>
                    <a class="btn btn-brand-accent" id="delete" value="' . $data['id'] . '" href="javascript:void(0);" onClick="delete_modal_show(\'' . $data['id'] . '\')">Delete</a>';
        });

        $datatables->edit('type', static function ($data) {
            return $data['type'] == 1 ? 'Packet plaintext match' : 'Packet hexadecimal match';
        });

        $body = $response->getBody();
        $body->write($datatables->generate());
    }

    public function ajax_log($request, $response, $args)
    {
        $datatables = new Datatables(new DatatablesHelper());
        $datatables->query('Select detect_log.id,user_id,user.user_name,node_id,node.name as node_name,list.id as rule_id,list.name as rule_name,list.text as rule_text,list.regex as rule_regex,list.type as rule_type,detect_log.datetime from detect_log,user,ss_node as node,detect_list as list where user.id=detect_log.user_id and node.id = detect_log.node_id and list.id = detect_log.list_id');

        $datatables->edit('rule_type', static function ($data) {
            return $data['rule_type'] == 1 ? 'Packet plaintext match' : 'Packet hexadecimal match';
        });

        $datatables->edit('datetime', static function ($data) {
            return date('Y-m-d H:i:s', $data['datetime']);
        });

        $body = $response->getBody();
        $body->write($datatables->generate());
    }
}
