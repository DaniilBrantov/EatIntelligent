<?php
    session_start();
    if (!$_SESSION['user'] && $_SESSION['user']['payment']!==2) {
        header('Location: auth');
    }
    if(!$_SESSION["stages"]){
        header('Location: uchebnaya-programma');
    }
    require_once "connect.php";
    $less_num =$_GET["id"];
    if($_SESSION['user']['payment']==1){
        $main_stages=mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM `main_subscription` WHERE `id` = '$less_num' ORDER BY id LIMIT 1 "));
    }else{
        $main_stages=mysqli_fetch_assoc(mysqli_query($mysqli,"SELECT * FROM `main_stages` WHERE `less_number` = '$less_num' ORDER BY id LIMIT 1 "));
    }
    
    $pos = strpos($_SESSION["stages"]['main'],$_SERVER['REQUEST_URI']);
    if($main_stages["title"]=="" || $pos==false ){
        header('Location: uchebnaya-programma');
    }

?>  
<div class="les">
        <div class="les_banner">
            <div class="les_title">
                <h1><?php echo $main_stages["title"];  ?></h1>
            </div>
            <hr>
                <iframe class="les_banner_img" width="700" height="400" src="<?php echo $main_stages['video']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <h2>Аудио</h2>
            <hr>
            <div class="les_audio_txt">
                <div class="les_audio_txt_title">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/headphone.png" alt="tTt">
                    <p>В аудиозаписи рассматриваются:</p>
                    <div class="curriculum_btn les_btn">
                            <button onclick="audioTxt()" id="les_button">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/account_arrow.svg" alt="">
                            </button>
                    </div>
                </div>
                <div id="les_audio_txt_cont" class="les_audio_txt_cont">
                    <hr>
                    <p><?php  echo $main_stages["audio_txt"];  ?> </p>
                </div>
            </div>
            <hr>
            <div class="audio_cont">
                <audio id="audio" controls preload="none">
                    <source src="<?php echo get_template_directory_uri(); ?>/personal_area/audio/<?php echo $main_stages['audio']; ?>" type="audio/mpeg">
                    <source src="<?php echo get_template_directory_uri(); ?>/personal_area/audio/<?php echo $main_stages['audio']; ?>" type="audio/ogg">
                    Ваш Браузер не поддерживает данный формат audio.
                </audio>
            </div>
        </div>
            
    <div class="container">
        <div class="les_goal">
            <div class="les_goal_item">
                <h3>Цель урока:</h3>
                <div class="les_goal_item_txt">
                    <p><?php  echo $main_stages["purpose"];  ?></p>
                </div>
            </div>
            <div class="les_goal_item">
                <h3>Результат урока:</h3>
                <div class="les_goal_item_txt">
                    <p><?php  echo $main_stages["result"];  ?></p>
                </div>
            </div>
        </div>
        <div class="les_theory">
            <h2>Теоритическая часть</h2>
            <hr>
        </div>
    </div>
        <div class="les_audio">
            <h2>Аудио</h2>
            <hr>
            <div class="les_audio_txt">
                <div class="les_audio_txt_title">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/headphone.png" alt="tTt">
                    <p>В аудиозаписи рассматриваются:</p>
                    <div class="curriculum_btn les_btn">
                            <button onclick="SecondAudioTxt()" id="second_les_button">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/account_arrow.svg" alt="">
                            </button>
                    </div>
                </div>
                <div id="second_les_audio_txt_cont" class="les_audio_txt_cont">
                    <hr>
                    <p><?php  echo $main_stages["second_audio_txt"]; ?></p>
                </div>
            </div>
            <hr>
            <div class="audio_cont">
                <audio id="audio" controls preload="none">
                    <source src="<?php echo get_template_directory_uri(); ?>/personal_area/audio/<?php echo $main_stages['second_audio']; ?>" type="audio/mpeg">
                    <source src="<?php echo get_template_directory_uri(); ?>/personal_area/audio/<?php echo $main_stages['second_audio']; ?>" type="audio/ogg">
                    Ваш Браузер не поддерживает данный формат audio.
                </audio>
            </div>
        </div>
    <div class="container">
            <div class="les_theory_content">
                <p><?php  echo $main_stages["theory_txt"];  ?></p>
            </div>
    </div>
        
    <div class="container les">
        <div class="les_hw">
            <h2>Домашнее задание</h2>
            <hr>
            <div class="les_hw_content">
                <img src="<?php echo get_template_directory_uri(); ?>/images/tg.svg" alt="">
                <div class="les_hw_link" onclick="tgTxt()"></div>
                <a href="https://web.telegram.org/k/" class="les_hw_link_txt">Написать мне <span>для выдачи д/з и прохождения вперёд</span> </a>
            </div>
            <div class="les_hw_tg">
                <a href="https://web.telegram.org/k/">@eatintel</a>
            </div>
        </div>
    </div>
</div>