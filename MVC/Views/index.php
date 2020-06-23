<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-8">
            <?php if(!empty($massage['massage'])){ ?>
                <div class="row justify-content-center">
                    <div class="alert alert-<?=$massage['type'] ?> alert-dismissible fade show" role="alert">
                        <?=$massage['massage'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php } ?>
            <div class="card shadow-lg">
                <div class="card-body">
                    <h2 class="card-title"></h2>
                    <form method="post" action="/index.php" name="formToAmoCrm">
                        <div class="form-group">
                            <label for="id">ID заказа</label>
                            <input type="number" name="id" class="form-control form-control-sm" id="id">
                        </div>
                        <div class="form-group">
                            <label for="how">Как вы узнали о нас</label>
                            <select class="custom-select my-1 mr-sm-2" id="how" name="how">
                                <option >Выбрать ответ</option>
                                <option >Нашли сайт в поиске</option>
                                <option >Через соцсети</option>
                                <option >2GIS</option>
                                <option >От знакомых</option>
                                <option >Баннеры, листовки</option>
                                <option >Постоянный клиент</option>
                                <option >Другая реклама</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mark">Оцените услуги по 10-бальной шкале</label>
                            <select class="custom-select my-1 mr-sm-2" id="mark" name="mark">
                                <option >Оценит</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Дата следующего оказание услуг</label>
                            <input type="date" name="date" class="form-control form-control-sm" id="date">
                        </div>
                        <div class="form-group">
                            <label for="serviceType">Вид следующих услуг</label>
                            <input type="text" name="serviceType" class="form-control form-control-sm" id="serviceType">
                        </div>
                        <div class="form-group">
                            <label for="voice">Оставьте, пожалуйста отзыв о нашей работе. Что нужно сделать,
                                чтобы получить высшую оценку?</label>
                            <input type="text" name="voice" class="form-control form-control-sm" id="voice">
                        </div>
                        <div class="form-group">
                            <label for="member">Участвую в дисконтной программе.</label>
                            <input type="text" name="member" class="form-control form-control-sm" id="member">
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-info" type="submit" >Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>$('.alert').alert();</script>
