<?php
if(!function_exists('addTdMain')) {
    function addTdMain(int $id, ?string $nom, bool $visible, bool $activ_visib, bool $all=false):?string {
        $string_visible = $visible ? " checked" : "";
        $string_activ_visib = $activ_visib ? "" : " disabled";
        $modif = $all ? '' : '<td class="td-admin img-modif"><img src="./src/images/pencil-fill.svg" alt=""></td>';
        return '<tr id="id-'.$id.'">'.
                    '<td>'.$nom.'</td>'.
                    '<td class="td-admin-visible img-visib"><input type="checkbox" class="darkSwitch two-column"'.$string_visible.$string_activ_visib.'></td>'.
                    $modif.
                    '<td class="td-admin img-delete"><img src="./src/images/trash3-fill.svg" alt=""></td>'.
                '</tr>';
    }
}
if(!function_exists('addTdError')) {
    function addTdError(int $id, ?string $date, ?string $message):?string {
        return '<tr class="error-load" id="id-'.$id.'">'.
                    '<td>'.$date.'</td>'.
                    '<td>'.$message.'</td>'.
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
                    '<td>'.$pseudo.'</td>'.
                    '<td>'.$email.'</td>'.
                    '<td><select name="role" class="role">'.$list_tab_role.'</select></td>'.
                    '<td class="td-admin img-modif"><img src="./src/images/pencil-fill.svg" alt=""></td>'.
                    '<td class="td-admin img-delete"><img src="./src/images/trash3-fill.svg" alt=""></td>'.
                '</tr>';
    }
}
if(!function_exists('addTdTabSupl')) {
    function addTdTabSupl(int $id, ?string $nom, ?string $nom_tab):?string {
        return '<tr id="'.$nom_tab.'id-'.$id.'">'.
                    '<td>'.$nom.'</td>'.
                    '<td class="td-admin img-modif"><img src="./src/images/pencil-fill.svg" alt=""></td>'.
                    '<td class="td-admin img-delete"><img src="./src/images/trash3-fill.svg" alt=""></td>'.
                '</tr>';
    }
}
if(!function_exists('choiceTab')) {
    function choiceTab(?string $lienTabMe, ?string $lienTabAll):?string {
        return '<div class="card-buttons_user">'.
                    '<a href="'.$lienTabMe.'">Mes contributions</a>'.
                    '<a href="'.$lienTabAll.'">Toutes les contributions</a>'.
                '</div>';
    }
}
