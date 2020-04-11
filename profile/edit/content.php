<!-- profile-bloc -->
<div class="bloc bloc-fill-screen bg-forrest tc-black l-bloc" id="profile-bloc">
    <div class="container">
        <div class="row">
            <div class="offset-lg-0 col-lg-3 offset-md-0 col-md-3 col-sm-4 col-5 d-sm-block d-none">
                <div class="card">
                    <img src="<?php echo URL; ?>/engine/img/lazyload-ph.png" data-src="<?php echo URL; ?>/engine/img/placeholder-user.png" class="img-fluid d-block img-margin-right lazyload" alt="placeholder user" />
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="mg-md text-center tc-black h3-margin-bottom btn-resize-mode"><?php echo htmlspecialchars($user['Login']); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offset-lg-0 col-lg-9 bgc-white offset-md-0 col-md-9 col-sm-8">
                <h3 class="mg-md tc-black h3-margin-top"><span class="fa fa-user-circle-o"></span> Личный кабинет | <small>Редактирование</small></h3>
                <?php
                $user_ID = intval($user['ID']);

                if (isset($_POST['edit']))
                {
                    $Login = mysqli_real_escape_string($db, $_POST['Login']);
                    if (mysqli_query($db,"UPDATE Accounts SET Login='$Login' WHERE id = '$user_ID';"))
                    {
                        header("Refresh: 3; ../../profile");
                        echo 'Операция выполнена успешно!';
                    }
                    else
                    {
                        header('Refresh: 10');
                        echo 'Ошибка. Изменения не были сохранены. Страница обновится через 10 секунд.';
                    }
                }
                ?>
                <form method="POST" novalidate>
                    <div class="form-group">
                        <label for="login_input">Логин:</label>
                        <input name="Login" type="text" id="login_input" placeholder="Введите логин" value="<?php echo htmlspecialchars($user['Login']); ?>" class="form-control" required/>
                    </div>

                    <button type="submit" name="edit" class="bloc-button btn btn-black float-lg-none">Сохранить</button>
                    <a href="<?php echo URL; ?>/profile" class="bloc-button btn btn-black float-lg-none">Назад</a> <br><br><br>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- profile-bloc END -->