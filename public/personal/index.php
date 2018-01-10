<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<div class="main-heading main-heading-black">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <a href="/personal/">
                Личный кабинет
            </a>
        </h1>
    </div>
</div>

<nav class="subnav">
    <div class="wrapper">
        <ul class="subnav-list">
            <li class="subnav-list-item active">
                <a href="/personal/" class="subnav-link">
                    <span>Мои данные</span>
                </a>
            </li>
            <li class="subnav-list-item">
                <a href="/personal/password/" class="subnav-link">
                    <span>Безопасность</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="cabinet-block">
    <div class="wrapper">
        <div class="cabinet-block-profile-wrapper">
            <div class="cabinet-block-heading">
                <div class="cabinet-block-title">
                    Профиль
                </div>
            </div>

            <div class="cabinet-block-profile-title">
                <?=$user['DISPLAY_NAME']?>
            </div>

            <div class="cabinet-block-profile-subtitle">
                <?=$user['WORK_POSITION']?>
            </div>

            <div class="cabinet-block-profile-table-title">
                Личные данные
            </div>

            <div class="overflow-auto">
                <table class="cabinet-block-profile-table">
                    <tr>
                        <th>Телефон</th>
                        <td><?=$user['PERSONAL_PHONE']?></td>
                    </tr>
                    <tr>
                        <th>Дата рождения</th>
                        <? if ($user['PERSONAL_BIRTHDAY']): ?>
	                        <? $d = FormatDate('j F Y', MakeTimeStamp($user['PERSONAL_BIRTHDAY'], "DD.MM.YYYY HH:MI:SS")); ?>
	                        <td><?=$d?></td>
	                    <? else: ?>
	                    	<td></td>
	                    <? endif ?>
                    </tr>
                    <tr>
                        <th>Регион</th>
                        <td><?=$user['PERSONAL_STATE']?></td>
                    </tr>
                    <tr>
                        <th>Город</th>
                        <td><?=$user['PERSONAL_CITY']?></td>
                    </tr>
                </table>
            </div>

            <div class="cabinet-block-profile-table-title">
                Организация
            </div>

            <div class="overflow-auto">
                <table class="cabinet-block-profile-table">
                    <tr>
                        <th>Организация</th>
                        <td><?=$user['WORK_COMPANY']?></td>
                    </tr>
                </table>
            </div>

            <a href="/personal/edit/" class="button button-light-burgundy">
                Редактировать
            </a>
        </div>
    </div>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>