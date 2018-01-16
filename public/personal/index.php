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
                <?=$user['DISPLAY_NAME']?> <?=$user['SECOND_NAME']?>
            </div>
            <div class="cabinet-block-profile-subtitle"> 
                &nbsp;
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
                        <th>E-mail</th>
                        <td><?=$user['EMAIL']?></td>
                    </tr>
                </table>
            </div>

            <div class="cabinet-block-profile-table-title">
                Информация о работе
            </div>

            <div class="overflow-auto">
                <table class="cabinet-block-profile-table">
                    <tr>
                        <th>Организация</th>
                        <td><?=$user['WORK_COMPANY']?></td>
                    </tr>                    
                    <tr>
                        <th>Должность</th>
                        <td><?=$user['WORK_POSITION']?></td>
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