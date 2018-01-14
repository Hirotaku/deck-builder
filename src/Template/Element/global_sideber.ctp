<?php
use App\Statics\UserInfo;
?>
<div class="sidebar-wrapper">
    <div class="logo">
        <a class="simple-text">
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
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'view', UserInfo::$user['id']]); ?>">
                <i class="ti-user"></i>
                <p>User Profile</p>
            </a>
        </li>
        <li>
          <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'logout']); ?>">
            <i class="ti-hand-open"></i>
            <p>Logout</p>
          </a>
        </li>
    </ul>
</div>
