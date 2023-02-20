<?php
if(!function_exists('addTdMain')) {
    function addTdMain(int $id, ?string $nom, bool $visible, bool $activ_visib):?string {
        $string_visible = $visible ? " checked" : "";
        $string_activ_visib = $activ_visib ? " disabled" : "";
        return '<tr id="id-'.$id.'">'.
                    '<th>'.$nom.'</th>'.
                    '<th class="th-admin-visible img-visib"><input type="checkbox" class="darkSwitch two-column"'.$string_visible.$string_activ_visib.'></th>'.
                    '<th class="th-admin img-modif"><img src="./src/images/pencil-fill.svg" alt=""></th>'.
                    '<th class="th-admin img-delete"><img src="./src/images/trash3-fill.svg" alt=""></th>'.
                '</tr>';
    }
}