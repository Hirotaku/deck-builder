<?php
use App\Statics\UserInfo;
?>
<div class="sidebar-wrapper">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text">
            MENU
        </a>
    </div>

    <ul class="nav">
        <li>
          <a href="<?= $this->Url->build(['controller' => 'Decks', 'action' => 'add', UserInfo::$user['id']]); ?>">
            <i class="ti-write"></i>
            <p>New Deck</p>
          </a>
        </li>
        <li class="active">
            <a href="<?= $this->Url->build(['controller' => 'Decks', 'action' => 'index', UserInfo::$user['id']]); ?>">
                <i class="ti-agenda"></i>
                <p>Deck List</p>
            </a>
        </li>
        <li>
            <a href="user.html">
                <i class="ti-user"></i>
                <p>User Profile</p>
            </a>
        </li>
    </ul>
</div>
