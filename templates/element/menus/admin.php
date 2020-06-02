<?php use Cake\Routing\Router; ?>


<?php if ($this->request->getSession()->read('Auth.User.menu.pedidos')) { ?>
    <li class="nav-item <?= (strpos(Router::url(), Router::url(['controller' => 'Pedidos'])) === 0) ? 'active' : '...'; ?>">
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Pedidos', 'action' => 'index']); ?>">
            <span class="feather-icon"><i data-feather="book"></i></span>
            <span class="nav-link-text">Pedidos</span>
        </a>
    </li>
<?php } ?>

<?php if ($this->request->getSession()->read('Auth.User.menu.empresas')) { ?>
    <li class="nav-item <?= (strpos(Router::url(), Router::url(['controller' => 'Empresas'])) === 0) ? 'active' : '...'; ?>">
        <a class="nav-link" href=<?= $this->Url->build(['controller' => 'Empresas', 'action' => 'index']); ?>">
            <span class="feather-icon"><i data-feather="package"></i></span>
            <span class="nav-link-text">Empresas</span>
        </a>
    </li>
<?php } ?>


<?php if ($this->request->getSession()->read('Auth.User.menu.usuarios')) { ?>
    <li class="nav-item <?= (strpos(Router::url(), Router::url(['controller' => 'Usuarios'])) === 0) ? 'active' : '...'; ?>">
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Usuarios', 'action' => 'index']); ?>">
            <span class="feather-icon"><i data-feather="user"></i></span>
            <span class="nav-link-text">Usuários</span>
        </a>
    </li>
<?php } ?>

<?php if ($this->request->getSession()->read('Auth.User.menu.produtos')) { ?>
    <li class="nav-item <?= (strpos(Router::url(), Router::url(['controller' => 'Produtos'])) === 0) ? 'active' : '...'; ?>">
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Produtos', 'action' => 'index']); ?>">
            <span class="feather-icon"><i data-feather="server"></i></span>
            <span class="nav-link-text">Produtos</span>
        </a>
    </li>
<?php } ?>

<?php if ($this->request->getSession()->read('Auth.User.menu.solicitar')) { ?>
    <li class="nav-item <?= (strpos(Router::url(), Router::url(['controller' => 'Solicitar'])) === 0) ? 'active' : '...'; ?>">
        <a class="nav-link" href="<?= $this->Url->build(['controller' => 'Solicitar', 'action' => 'index']); ?>">
            <span class="feather-icon"><i data-feather="server"></i></span>
            <span class="nav-link-text">Solicitar</span>
        </a>
    </li>
<?php } ?>