<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
?> 

<div class="main-heading main-heading-black">
    <div class="wrapper">
        <h1 class="main-heading-title">
            <a href="/en/personal/">
                Personal area
            </a>
        </h1>
    </div>
</div>

<nav class="subnav">
    <div class="wrapper">
        <ul class="subnav-list">
            <li class="subnav-list-item active">
                <a href="/en/personal/" class="subnav-link">
                    <span>My data</span>
                </a>
            </li>
            <li class="subnav-list-item">
                <a href="/en/personal/password/" class="subnav-link">
                    <span>Security</span>
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
                    Profile
                </div>
                <div class="cabinet-block-profile-subtitle"> 
                    &nbsp;
                </div>
            </div>

            <div class="cabinet-block-profile-title">
                <?=$user['DISPLAY_NAME']?> <?=$user['SECOND_NAME']?>
            </div>

            <div class="cabinet-block-profile-table-title">
                Personal data
            </div>

            <div class="overflow-auto">
                <table class="cabinet-block-profile-table">
                    <tr>
                        <th>Phone</th>
                        <td><?=$user['PERSONAL_PHONE']?></td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td><?=$user['EMAIL']?></td>
                    </tr>
                </table>
            </div>

            <div class="cabinet-block-profile-table-title">
                Job Information
            </div>

            <div class="overflow-auto">
                <table class="cabinet-block-profile-table">
                    <tr>
                        <th>Company</th>
                        <td><?=$user['WORK_COMPANY']?></td>
                    </tr>                    
                    <tr>
                        <th>Position</th>
                        <td><?=$user['WORK_POSITION']?></td>
                    </tr>
                </table>
            </div>

            <a href="/en/personal/edit/" class="button button-light-burgundy">
                Edit
            </a>
        </div>
    </div>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>