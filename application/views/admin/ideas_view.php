<div class="container">
    <div class="row">
        <div>
            <span>Список идей</span>
        </div>
        <hr/>
        <div class="alert alert-info">
            <a href="<?=base_url();?>index.php/admin/view/add_idea/">+Добавить</a>
        </div>
        <div>
            <input type="text" class="form-control" placeholder="Search">
        </div>

        <div class="table">
            <table class="table">
                <thead></thead>
                <tbody>
                <?
                foreach($ideas as $item){
                    echo '<tr>';
                    echo '<td><img width="160" src="'.$item['idea_photo'].'" alt="idea_photo"/></td>';
                    echo '<td>'.$item['title_ru'].'</td>';
                    echo '<td>'.rus_date_format($item['created_at']).'</td>';
                    echo '<td><a href="'.base_url().'index.php/admin/update/idea/'.$item['id'].'">Редактировать</a></td>';
                    echo '<td><a class="text-danger" href="'.base_url().'index.php/admin/delete/idea/'.$item['id'].'">Удалить</a></td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>