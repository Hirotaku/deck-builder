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
                <i class="ti-clipboard"></i>
                <p>Deck List</p>
            </a>
        </li>
        <li>
          <a href="<?= $this->Url->build(['controller' => 'Decks', 'action' => 'publicIndex', UserInfo::$user['id']]); ?>">
            <i class="ti-world"></i>
            <p>Public Deck List</p>
          </a>
        </li>
        <li>
          <a href="<?= $this->Url->build(['controller' => 'Wants', 'action' => 'index', UserInfo::$user['id']]); ?>">
            <i class="ti-wallet"></i>
            <p>WANTS List</p>
          </a>
        </li>
        <li>
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'edit', UserInfo::$user['id']]); ?>">
                <i class="ti-user"></i>
                <p>Edit Profile</p>
            </a>
        </li>
        <li>
            <a href="<?= $this->Url->build(['controller' => 'Api', 'action' => 'index']); ?>">
                <i class="ti-cloud-down"></i>
                <p>API CHECK</p>
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
