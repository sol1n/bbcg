<?
define('NEED_MAP', 1);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<section class="about-academy-block">
    <div class="wrapper">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <div class="about-academy-block-text">
                    <h1 class="about-academy-block-subtitle">
                        Академия ритейла
                    </h1>
                    <h2 class="about-academy-block-title">
                        Новое будущее ритейла. <br> Сегодня!
                    </h2>

                    <div class="about-academy-block-desc">
                        Ритейл &mdash; одна из самых динамичных и технологичных отраслей экономики. И чем стремительнее меняется ритейл, тем острее ощущается дефицит квалифицированных кадров. С каждым днем увеличивается разрыв между теоретической базой высшей школы и реальными задачами бизнеса
                    </div>

                    <a href="#academy-programm" class="button button-old-gold js-smooth-scroll">
                        <span class="c-text">Программы академии</span>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="about-academy-block-logo">
                    <img src="/assets/images/retail-academy.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="summit-text-block">
    <div class="wrapper">

        <h3 class="h2 tt-uppercase m-t-n">
            Открытые программы
        </h3>

        <div class="row m-b-xl">
            <div class="col-xs-12 col-md-6">
                <ul class="ul-square-old-gold">
                    <li>
                        Подготовлены на базе исследований и прямых запросов членов Академии.
                    </li>
                    <li>
                        Отражают логику и структуру программ ведущих международных партнеров Академии.
                    </li>
                    <li>
                        Объединяют слушателей (топ-менеджмент) из компаний лидеров отрасли.
                    </li>
                    <li>
                        Проходят в самом современном образовательном формате intensive & hyper connected.
                    </li>
                    <li>
                        Не существует двух одинаковых курсов, контент непрерывно обновляется и актуализируется.
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <ul class="ul-square-old-gold">
                    <li>
                        Всегда более 75% спикеров это CEO и топ-менедж- мент крупнейших компаний.
                    </li>
                    <li>
                        100% материалов всегда доступны слушателям на мобильных устройствах.
                    </li>
                </ul>
            </div>
        </div>

        <h3 class="h2 tt-uppercase m-t-n">
            Корпоративные курсы, МВА и стратегические сессии
        </h3>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <ul class="ul-square-old-gold">
                    <li>
                        Готовятся на основе интервью с первыми лицами компании.
                    </li>
                    <li>
                        Отражают ключевые тренды, данные исследова- ний, часто проводимых специально.
                    </li>
                    <li>
                        Проводятся с привлечением экспертизы и, даже, с личным участием Членов Академии.
                    </li>
                    <li>
                        Начиная с 2018 года проводятся в формате intensive & hyper connected.
                    </li>
                    <li>
                        Всегда учитывают задачу развития кроссфункци- онального взаимодействия в бизнесе.
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <ul class="ul-square-old-gold">
                    <li>
                        Всегда включают анализ итогов и обратную связь для руководителей бизнеса.
                    </li>
                    <li>
                        Всегда 100% материалов доступны слушателям на мобильных устройствах.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "cources-page",
    Array(
        "ADD_SECTIONS_CHAIN" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(),
        "IBLOCK_ID" => COURCES_IBLOCK,
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "NEWS_COUNT" => "16",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => "main",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PROPERTY_CODE" => array("*"),
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SORT_BY1" => "PROPERTY_BEGIN",
        "SORT_ORDER1" => "ASC",
        "TITLE" => "Академия ритейла",
        "SUBTITLE" => "Программы обучения"
    )
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>