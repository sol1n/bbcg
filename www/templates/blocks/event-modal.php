<div class="side-modal-event-title">
    Дискуссии о ключевых трендах развития образования
</div>

<div class="news-item-meta-2 m-b-lg">
    <span class="news-item-meta-2-date">
        <?php include "../../assets/images/icons/icon-news-item-clock.svg"; ?>
        16 июня, 12:30 – 13:30
    </span>
    <span class="news-item-meta-2-place">
        <?php include "../../assets/images/icons/icon-map-mark.svg"; ?>
        Зал №1
    </span>
    <a href="#" class="news-item-meta-2-fav">
        <?php include "../../assets/images/icons/icon-news-item-fav.svg"; ?>
        <!--<?php include "../../assets/images/icons/icon-news-item-fav-active.svg"; ?>-->
        Добавить в избранное
    </a>
</div>

<div class="side-modal-event-description">
    <p>
        С 7 по 9 сентября в 75-м павильоне ВДНХ пройдет Московский международный форум «Город образования». На три дня мероприятие представит на одной площадке все образовательные возможности столицы. Организаторы форума ожидают участников со всего мира, в числе спикеров заявлены знаменитый индийский ученый и профессор Ньюкаслского университета Сугата Митра и авторитетный эксперт в области образования Уильям Ранкин.
    </p>
</div>

<h4 class="tt-uppercase">Спикеры</h4>

<div class="m-t-md m-b-md">
    <ul class="speakers-list">
        <?php
        $colors = ["blue-theme", "ink-theme", "yellow-theme", "orange-theme", "red-theme", "magenta-theme", "green-theme", "red-orange-theme", "salad-theme", "navy-theme"];
        ?>

        <li class="speakers-list-item">
            <a href="#" class="speakers-list-item-link">
                <div class="speakers-list-item-avatar <?php echo $colors[array_rand($colors)]; ?>">
                    <div class="speakers-list-item-avatar-circle">
                        МК
                    </div>
                </div>
                <div class="speakers-list-item-text">
                    <div class="speakers-list-item-title">
                        Марита Коскинен
                    </div>
                    <div class="speakers-list-item-subtitle">
                        Генеральный директор, Prisma
                    </div>
                    <div class="speakers-list-item-event">
                        Вступительная речь
                    </div>
                </div>
            </a>
        </li>

        <li class="speakers-list-item">
            <a href="#" class="speakers-list-item-link">
                <div class="speakers-list-item-avatar <?php echo $colors[array_rand($colors)]; ?>">
                    <div class="speakers-list-item-avatar-circle">
                        АТ
                    </div>
                </div>
                <div class="speakers-list-item-text">
                    <div class="speakers-list-item-title">
                        Алексей Токлович
                    </div>
                    <div class="speakers-list-item-subtitle">
                        Web-мастер
                    </div>
                    <div class="speakers-list-item-event">
                        Ознакомление с курсом дела
                    </div>
                </div>
            </a>
        </li>

        <li class="speakers-list-item">
            <a href="#" class="speakers-list-item-link">
                <div class="speakers-list-item-photo">
                    <img src="../assets/images/tmp/speakers/speaker-1.png" alt="Марита Коскинен">
                </div>
                <div class="speakers-list-item-text">
                    <div class="speakers-list-item-title">
                        Марита Коскинен
                    </div>
                    <div class="speakers-list-item-subtitle">
                        Генеральный директор, Prisma
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>