<?php
if(!function_exists('addTdMain')) {
    function addTdMain(int $id, ?string $nom, bool $visible, bool $activ_visib, bool $all=false):?string {
        $string_visible = $visible ? " checked" : "";
        $string_activ_visib = $activ_visib ? "" : " disabled";
        $modif = $all ? '' : '<th class="th-admin img-modif"><img src="./src/images/pencil-fill.svg" alt=""></th>';
        return '<tr id="id-'.$id.'">'.
                    '<th>'.$nom.'</th>'.
                    '<th class="th-admin-visible img-visib"><input type="checkbox" class="darkSwitch two-column"'.$string_visible.$string_activ_visib.'></th>'.
                    $modif.
                    '<th class="th-admin img-delete"><img src="./src/images/trash3-fill.svg" alt=""></th>'.
                '</tr>';
    }
}
if(!function_exists('addOptionCat')) {
    function addOptionCat(int $id, ?string $nom, int $id_selected = 0):?string {
        $selected = (!empty($id_selected)) ? (($id==$id_selected) ? " selected" : "") : "";
        return '<option value="'.$id.'"'.$selected.'>'.$nom.'</option>';
    }
}
if(!function_exists('addImg')) {
    function addImg(int $id, ?string $nom_folder, ?string $src, ?string $alt):?string {
        $selected = (!empty($id_selected)) ? (($id==$id_selected) ? " selected" : "") : "";
        return '<div id="idimg-'.$id.'">'.
                    '<img src="./../upload/'.$nom_folder.'/'.$src.'" alt="'.$alt.'" />'.
                    '<img src="./src/images/trash3-fill.svg" alt="delete image" class="delete_img" />'.
                '</div>';
    }
}

if(!function_exists('addOptionRole')) {
    function addOptionRole(int $id, ?string $nom, int $id_role_user = 0):?string {
        $selected = (!empty($id_role_user)) ? (($id==$id_role_user) ? " selected" : "") : "";
        return '<option value="'.$id.'"'.$selected.'>'.$nom.'</option>';
    }
}
if(!function_exists('addTdUserMain')) {
    function addTdUserMain(int $id, ?string $pseudo, ?string $email, int $type, ?array $tab_role = null):?string {
        $list_tab_role = "";
        if(!empty($tab_role)) {
            foreach ($tab_role as $value) {
                $list_tab_role .= addOptionRole($value['id_role'], $value['role'], $type);
            }
        }
        return '<tr id="id-'.$id.'">'.
                    '<th>'.$pseudo.'</th>'.
                    '<th>'.$email.'</th>'.
                    '<th><select name="role" class="role">'.$list_tab_role.'</select></th>'.
                    '<th class="th-admin img-modif"><img src="./src/images/pencil-fill.svg" alt=""></th>'.
                    '<th class="th-admin img-delete"><img src="./src/images/trash3-fill.svg" alt=""></th>'.
                '</tr>';
    }
}
?>