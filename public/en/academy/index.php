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
                        Retail academy
                    </h1>
                    <h2 class="about-academy-block-title">
                        The new future of retail. <br> Now!
                    </h2>

                    <div class="about-academy-block-desc">
                        Retail &mdash; one of the most dynamic and technological branches of the economy. And the more rapidly retailing changes, the more acute the shortage of qualified personnel. Each day the gap between the theoretical basis of higher education and the real business objectives increases
                    </div>

                    <a href="#academy-programm" class="button button-old-gold js-smooth-scroll">
                        <span class="c-text">Cources list</span>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="about-academy-block-logo">
                    <img src="/assets/images/retail-academy-en.svg" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="summit-text-block">
    <div class="wrapper">

        <h3 class="h2 tt-uppercase m-t-n">
            Open programs
        </h3>

        <div class="row m-b-xl">
            <div class="col-xs-12 col-md-6">
                <ul class="ul-square-old-gold">
                    <li>
                        Prepared on the basis of research and direct requests of members of the Academy.
                    </li>
                    <li>
                        Reflect the logic and structure of the programs of the leading international partners of the Academy.
                    </li>
                    <li>
                        They unite listeners (top management) from the companies of industry leaders.
                    </li>
                    <li>
                        Pass in the most modern educational format intensive & hyper connected.
                    </li>
                    <li>
                        There are no two identical courses, the content is continuously updated and updated.
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <ul class="ul-square-old-gold">
                    <li>
                        Always more than 75% of the speakers are the CEO and top management of the largest companies.
                    </li>
                    <li>
                        100% of the materials are always available to listeners on mobile devices.
                    </li>
                </ul>
            </div>
        </div>

        <h3 class="h2 tt-uppercase m-t-n">
            Corporate courses, MBA and strategic sessions
        </h3>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <ul class="ul-square-old-gold">
                    <li>
                        Prepare on the basis of interviews with the company's top executives.
                    </li>
                    <li>
                        Reflect key trends, research data, often conducted specifically.
                    </li>
                    <li>
                        They are conducted with the assistance of expertise and, even, with the personal participation of the members of the Academy.
                    </li>
                    <li>
                        Starting in 2018, they are held in the format intensive & hyper connected.
                    </li>
                    <li>
                        Always consider the task of developing cross-functional interaction in business.
                    </li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <ul class="ul-square-old-gold">
                    <li>
                        Always include an analysis of the results and feedback for business executives.
                    </li>
                    <li>
                        100% of the materials are available to listeners on mobile devices.
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
        "LANG" => "en",
        "TITLE" => "Retail academy",
        "SUBTITLE" => "Cources"
    )
);?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>