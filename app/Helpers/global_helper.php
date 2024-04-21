<?php

use App\Models\metadata;

function get_meta_value($meta_key) {
    $data = metadata::where('meta_key', $meta_key)->first();
    if($data) {
        return $data->meta_value;
    }
}

function set_about_name($name) {
    $arr = explode(" ", $name);
    $lastword = end($arr);
    $lastword2 = "<span class='text-primary'>$lastword</span>";
    array_pop($arr);
    $firstword = implode(" ", $arr);
    return $firstword ." ". $lastword2;
}

function set_list_award($list) {
    $list = str_replace("<ul>", '<ul class="fa-ul mb-0">', $list);
    $list = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-trophy text-warning"></i></span>', $list); 
    return $list;
}

function set_list_workflow($workflow) {
    $workflow = str_replace("<ul>", '<ul class="fa-ul mb-0">', $workflow);
    $workflow = str_replace("<li>", '<li><span class="fa-li"><i class="fas fa-check"></i></span>', $workflow); 
    return $workflow;
}