<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <?= $this->Flash->render() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Arte Dental Aqp
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon', 'favicon.png', ['type' => 'icon']) ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <?= $this->Html->css('home.css') ?> <!-- Enlace a tu archivo home.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?= $this->Html->script('home.js') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
<div class="image-container">
    <img alt="Arte Dental AQP" src="img/logo.png" width="250" />
</div>
<ul class="accordion-menu">
<i class=""></i>

    <div class="dropdownlink"><i class="fa fa-user" aria-hidden="true"></i> Paciente
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Pacientes', ['controller' => 'Paciente', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar Pacientes', ['controller' => 'Paciente', 'action' => 'add']) ?></li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa-solid fa-user-doctor" aria-hidden="true"></i> Odontologo
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Odontólogos', ['controller' => 'Odontologo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar Odontólogos', ['controller' => 'Odontologo', 'action' => 'add']) ?></li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa fa-book" aria-hidden="true"></i> Historia Medica
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Historia Médica', ['controller' => 'HistoriaMedica', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar Historia Médica', ['controller' => 'HistoriaMedica', 'action' => 'add']) ?></li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa-solid fa-calendar-days" aria-hidden="true"></i> Citas
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Citas', ['controller' => 'Citas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar Cita', ['controller' => 'Citas', 'action' => 'add']) ?></li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa fa-book" aria-hidden="true"></i> Historia Clinica
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Historia Clínica', ['controller' => 'HistoriaClinica', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link('Agregar Historia Clinica', ['controller' => 'HistoriaClinica', 'action' => 'add']) ?> </li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa fa-notes-medical" aria-hidden="true"></i> Odontograma
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Odontograma', ['controller' => 'Odontograma', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar Odontograma', ['controller' => 'Odontograma', 'action' => 'add']) ?></li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa fa-list" aria-hidden="true"></i> Detalles del Odontograma
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Detalle de Odontograma', ['controller' => 'OdontogramaDetalle', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar OdontogramaDetalle', ['controller' => 'OdontogramaDetalle', 'action' => 'add']) ?></li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa fa-kit-medical" aria-hidden="true"></i> Tratamiento
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Tratamiento', ['controller' => 'Tratamiento', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar Tratamiento', ['controller' => 'Tratamiento', 'action' => 'add']) ?></li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa fa-list" aria-hidden="true"></i> Detalles del Tratamiento
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Detalle de Tratamiento', ['controller' => 'DetalleTratamiento', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar Detalle de Tratamiento', ['controller' => 'DetalleTratamiento', 'action' => 'add']) ?></li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa fa-list-check" aria-hidden="true"></i> Historial de Trabajo
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Historial de Trabajo', ['controller' => 'HistorialTrabajo', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar Historial Trabajo', ['controller' => 'HistorialTrabajo', 'action' => 'add']) ?></li>
    </ul>
    </li>

    <li>
    <div class="dropdownlink"><i class="fa-solid fa-users" aria-hidden="true"></i> Usuarios
        <i class="fa fa-chevron-down" aria-hidden="true"></i>
    </div>
    <ul class="submenuItems">
        <li><?= $this->Html->link('Usuarios', ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link('Agregar Usuarios', ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
    </li>

</ul>
<footer>
    <br>
    <p style="text-align: center;"><?= COPYRIGHT_TEXT ?></p>
</footer>
</body>
</html>
