<?php 

    error_reporting(-1); 
    $patient;

    if (!empty($_POST)) {
        $patient = [
            "parodontosis" => $_POST['parodontosis'],
            "teethAreMissing" => $_POST['teethAreMissing'],
            "mobilityOfTeeth" => $_POST['mobilityOfTeeth'],
            "dateOfDeletion" => $_POST['dateOfDeletion'],
            "name" => $_POST['name'],
            "phone" => $_POST['phone'],
        ];

        $patient_parodontosis = "Пародонтос: {$_POST['parodontosis']}\n";
        $patient_teethAreMissing = "Сколько зубов нет: {$_POST['teethAreMissing']}\n";
        $patient_mobilityOfTeeth = "Подвижность зубов: {$_POST['mobilityOfTeeth']}\n";
        $patient_dateOfDeletion = "Как давно удаляли зубы: {$_POST['dateOfDeletion']}\n";
        $patient_name = "Имя: {$_POST['name']}\n";
        $patient_phone = "Телефон: {$_POST['phone']}\n";

        $patient_data =  "Пациент\n" . $patient_phone . $patient_name . $patient_paradontosis . $patient_teethAreMissing . $patient_mobilityOfTeeth . $patient_dateOfDeletion . "\n";

        file_put_contents('patient.txt', $patient_data, FILE_APPEND);
        header("Location: index.php");
        exit;
    }

    $flagsJSON = file_get_contents('countries.json');
    $flags = json_decode($flagsJSON, true);
    // echo "<pre>";
    // print_r($flags);
    // echo "</pre>";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Демократ</title>
</head>
<body>
    <header class="header">
        <div class="content">
            <div class="wrapper">
                <div class="logo">
                    <img src="img/logo.svg" alt="" class="logo_img">
                </div>
    
                <div class="header_consultation">
                    <a class="header_consultation_phone">+7(345)250-07-86</a>
                    <a href="#" class="btn">Получить консультацию</a>
                    <a href="#" class="btn_mobile"><img class="btn_mobile" src="img/icons/call.png" alt=""></a>
                </div>
            </div>
        </div>
    </header>

    <section class="quiz">
        <div class="content">
            <figure class="quiz_head">
                <h1 class="quiz_title">Ответьте на несколько вопросов</h1>
                <figcaption class="quiz_title_caption">и получите расчет стоимости на <span class="wavyline-main">имплантацию или протезирование <b>со скидкой до 15%</b></span></figcaption>
            </figure>

            <div class="wrapper min-column">
                <div class="quiz_form_block">
                    <div class="wrapper">
                        <div>
                            <div class="quiz_form_progress">
                                <div class="quiz_form_progress_text">
                                    <h2 class="quiz_form_progress_title">Готовность расчета со скидкой :</h2>
                                    <p class="quiz_form_progress_percent" id="quiz_form_progress_percent">5%</p>
                                </div>
                                <div class="quiz_form_progress_line-contain">
                                    <div class="quiz_form_progress_line" id="quiz_form_progress_line"></div>
                                </div>
                            </div>
        
                            <form action="index.php" method="POST" class="quiz_form" name="patient">
                                <div class="quiz_form_wrapper">
                                    <div class="quiz_form_selects_wrapper">
                                        <div class="wrapper">
                                            <div class="quiz_form_select_block">
                                                <p class="quiz_form_select_question">1.Есть ли у вас парадонтоз?</p>
                                                <select name="parodontosis" id="paradontosis" class="quiz_form_select" required>
                                                    <option value="Не выбрано">Не выбрано</option>
                                                    <option value="Да">Да</option>
                                                    <option value="Нет">Нет</option>
                                                    <option value="Не знаю">Не знаю</option>
                                                </select>
                                            </div>
                
                                            <div class="quiz_form_select_block">
                                                <p class="quiz_form_select_question">2.Сколько зубов у вас отсутствует?</p>
                                                <select name="teethAreMissing" id="teethAreMissing" class="quiz_form_select" required>
                                                    <option value="Не выбрано">Не выбрано</option>
                                                    <option value="От 1 до 5">От 1 до 5</option>
                                                    <option value="От 5 до 10">От 5 до 10</option>
                                                    <option value="Более 10">Более 10</option>
                                                    <option value="Вся нижняя/верхняя челюсть">Вся нижняя/верхняя челюсть</option>
                                                    <option value="Не могу точно сказать">Не могу точно сказать</option>
                                                </select>
                                            </div>
                                        </div>
            
                                        <div class="wrapper">
                                            <div class="quiz_form_select_block">
                                                <p class="quiz_form_select_question">3.Есть ли у вас подвижность зубов?</p>
                                                <select name="mobilityOfTeeth" id="mobilityOfTeeth" class="quiz_form_select" required>
                                                    <option value="Не выбрано">Не выбрано</option>
                                                    <option value="Да">Да</option>
                                                    <option value="Нет">Нет</option>
                                                    <option value="Не знаю">Не знаю</option>
                                                </select>
                                            </div>
                
                                            <div class="quiz_form_select_block">
                                                <p class="quiz_form_select_question">4.Как давно вам удаляли зубы?</p>
                                                <select name="dateOfDeletion" id="dateOfDeletion" class="quiz_form_select" required>
                                                    <option value="Не выбрано">Не выбрано</option>
                                                    <option value="Меньше месяца назад">Меньше месяца назад</option>
                                                    <option value="1-6 месяцев назад">1-6 месяцев назад</option>
                                                    <option value="От полугода до года назад">От полугода до года назад</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
        
                                    <div class="wrapper" id="phone_wrapper">
                                        <div class="quiz_form_select_block">
                                            <p class="quiz_form_select_question">Как мы можем к Вам обращаться?</p>
                                            <input name="name" type="text" id="name" placeholder="Имя:" class="quiz_form_select" required>
                                        </div>
            
                                        <div class="quiz_form_select_block" id="quiz_form_select_phone_block">
                                            <p class="quiz_form_select_question">Введите Ваш номер телефона?</p>
                                            <div class="quiz_form_select_phone_flag_block" id="quiz_form_select_phone_flag_block">
                                                <img src="img/flags/RU.svg" class="quiz_form_select_phone_flag" id="quiz_form_select_phone_flag">
                                                <span class="quiz_form_select_phone_flag_arrow">&#9660</span>
                                            </div>
                                            <input name="phone" type="tel" id="phone" placeholder="+7 (***) ***-**-**" class="quiz_form_select" maxlength="20" required>
                                                <div class=phoneMask id="phoneMask" value="+7">
                                                    <?php 
                                                        for ($i = 0; $i < count($flags); $i++) {
                                                            echo '<div class="phoneMask_option"><input type="hidden" class="phoneMask_option_input" value="' . $flags[$i]['Маска'] . '">';
                                                            echo '<input type="hidden" class="phoneMask_option_input_flag" value="' . $flags[$i]['CC'] . '">';
                                                            echo '<span>';
                                                            echo $flags[$i]['На английском'];
                                                            echo '</span>';
                                                            echo '<div>';
                                                            echo '<span class="phone_index">' . $flags[$i]['Индекс'] . '</span>';
                                                            echo '<img src="img/flags/' . $flags[$i]['CC'] . '.svg" class="flag">';
                                                            echo '</div>';
                                                            echo '</div>';
                                                        }
                                                    ?>
                                                </div>
                                        </div>
                                    </div>
        
                                    <button type="submit" class="btn quiz_form_btn" name="quiz_form">
                                        Получить расчет
                                        <img src="img/cursor.svg" alt="" class="quiz_form_btn_cursor">
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div class="quiz_form_teeth">
                            <div class="quiz_form_teeth_cloud">
                                <p class="quiz_form_teeth_text">Мы рассчитаем стоимость для Вас ещё до посещения врача!</p>
                            </div>
                            <img src="img/teeth.webp" alt="" class="quiz_form_teeth-img">
                        </div>
                    </div>
                </div>

                <div class="quiz_options">
                    <div class="wrapper">
                        <div class="quiz_option_block" id="quiz_option_block-1">
                            <h2 class="quiz_option_title">
                                Безболезненная имплантация
                            </h2>
                            <p class="quiz_option_intro">
                                по <span class="wavyline" id="wavyline-1">демократичным ценам</span>
                            </p>
                            <img src="img/icons/implant.svg" id="quiz_option_icon-1" alt="" class="quiz_option_icon">
                        </div>
    
                        <div class="quiz_option_block" id="quiz_option_block-2">
                            <p class="quiz_option_intro">
                                Пожизненная <span class="wavyline" id="wavyline-2">гарантия</span> на импланты
                            </p>
                            <img src="img/icons/garant.svg" id="quiz_option_icon-2" alt="" class="quiz_option_icon">
                            <img src="img/optionArrowRight.svg" alt="" class="quiz_option_block_arrow" id="quiz_option_block_arrow-2">
                        </div>
                    </div>

                    <div class="wrapper">
                        <div class="quiz_option_block" id="quiz_option_block-3">
                            <h2 class="quiz_option_title">
                                Бесплатная консультация
                            </h2>
                            <p class="quiz_option_intro" id="quiz_option_intro-3">
                                с <span class="wavyline" id="wavyline-3">опытным врачом</span>
                            </p>
                            <img src="img/optionArrowLeft.svg" alt="" class="quiz_option_block_arrow" id="quiz_option_block_arrow-3">
                            <img src="img/icons/consultation.svg" id="quiz_option_icon-3" alt="" class="quiz_option_icon">
                        </div>
                        
                        <div class="quiz_option_block" id="quiz_option_block-4">
                            <img src="img/icons/installment.svg" id="quiz_option_icon-4" alt="" class="quiz_option_icon">
                            <h2 class="quiz_option_title">
                                Фирменная рассрочка без %
                            </h2>
                            <p class="quiz_option_intro">
                                <span class="medium">Банковская рассрочка <span class="wavyline" id="wavyline-4">от <b>6 до 36 месяцев</></span></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="content">
            <div class="wrapper">
                <div class="footer_license">
                    <a href="#">Лицензия</a>
                </div>

                <p class="footer_text">
                    Общество с ограниченной ответственностью "Демократ Тюмень"<br> 
                    ИНН 8602294218, КПП 860201001,<br>
                    ОГРН 1198617011735, ОКПО 32211342
                </p>

                <p class="footer_text">Тюмень, ул.Малыгина, д.14, к.3</p>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/dependencyLibs/inputmask.dependencyLib.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>