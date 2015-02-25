<div class="container">
    <div class="row">
        <div>
            <span>Список рецептов</span>
        </div>
        <hr/>
        <div class="alert alert-info">
            <a href="<?=base_url();?>index.php/admin/view/add_recipe/">+Добавить</a>
        </div>
        <div>
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <?
        echo '<pre>';
        print_r($categories);
        echo '</pre>';
        ?>
        <div class="table">
            <table class="table">
                <thead></thead>
                <tbody>
                    <?
                        foreach($recipes as $recipe){
                            echo '<tr>';
                                echo '<td><img width="160" src="'.$recipe['finish_photo'].'" alt="recipe_photo"/></td>';
                                echo '<td>'.$recipe['title_ru'].'</td>';
                                echo '<td>'.rus_date_format($recipe['created_at']).'<br/><div style="font-size: 12px; color: #c9c9c9;">Выпечка, Десерты, Завтраки, Тесто</div></td>';
                                echo '<td><a href="'.base_url().'index.php/admin/update/recipe/'.$recipe['id'].'">Редактировать</a></td>';
                                echo '<td><a class="text-danger" href="'.base_url().'index.php/admin/delete/recipe/'.$recipe['id'].'">Удалить</a></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>