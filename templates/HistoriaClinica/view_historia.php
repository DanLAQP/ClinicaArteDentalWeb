<!-- templates/HistoriaClinica/viewHistoria.ctp -->
<div class="historia-clinica view content">
    <h3>Historia Clínica Odontologica Nro - <?= h($historia->HisCliCod) ?></h3>


    <div class="column-responsive column-80">
        <div class="paciente view content">
            <?php if ($historia->paciente): ?>
                <h3> Datos Personales del Paciente</h3>
                <table>
                    <tr>
                        <th><?= __('Codigo del Paciente') ?></th>
                        <td><?= $this->Number->format($historia->paciente->PacCod) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Nombres') ?></th>
                        <td><?= h($historia->paciente->PacNom) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('DNI') ?></th>
                        <td><?= $historia->paciente->PacDni === null ? '' : $this->Number->format($historia->paciente->PacDni) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Celular') ?></th>
                        <td><?= $historia->paciente->PacCel === null ? '' : $this->Number->format($historia->paciente->PacCel) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Direccion') ?></th>
                        <td><?= h($historia->paciente->PacDir) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($historia->paciente->PacEma) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Ocupacion') ?></th>
                        <td><?= h($historia->paciente->PacOcu) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Referido') ?></th>
                        <td><?= h($historia->paciente->PacRef) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Año de Nacimiento') ?></th>
                        <td><?= $historia->paciente->PacAnoNac === null ? '' : $this->Number->format($historia->paciente->PacAnoNac) ?></td>
                    </tr>

                </table>
                <!-- <br>
                <div style="text-align: center;">
                <?= $this->Html->link(__('Editar Paciente'), ['controller' => 'Paciente', 'action' => 'edit', $historia->paciente->PacCod], ['class' => 'button']) ?>
                </div> -->
            <?php else: ?>
                <p>No hay información del paciente disponible.</p>
            <?php endif; ?>
        </div>
    </div>
    <br>

        <div class="column-responsive column-80">
            <div class="odontologo view content">
            <?php if ($historia->odontologo): ?>
                <h3>Datos del Odontólogo</h3>
                <table>
                    <tr>
                        <th><?= __('Codigo del Odontologo') ?></th>
                        <td><?= $this->Number->format($historia->odontologo->OdoCod) ?></td>
                    </tr>

                    <tr>
                        <th><?= __('Nombre Odontologo') ?></th>
                        <td><?= h($historia->odontologo->OdoNom) ?></td>
                    </tr>

                    <!-- <tr>
                        <th><?= __('Año de Ingreso') ?></th>
                        <td><?= $historia->odontologo->OdoFecIngAno === null ? '' : $this->Number->format($historia->odontologo->OdoFecIngAno) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Mes de Ingreso') ?></th>
                        <td><?= $historia->odontologo->OdoFecIngMes === null ? '' : $this->Number->format($historia->odontologo->OdoFecIngMes) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Dia de ingreso') ?></th>
                        <td><?= $historia->odontologo->OdoFecIngDia === null ? '' : $this->Number->format($historia->odontologo->OdoFecIngDia) ?></td>
                    </tr> -->
                </table>

            </div>
        </div>
        <?php else: ?>
            <p>No hay información del odontólogo disponible.</p>
        <?php endif; ?>
        <br>


        <div class="column-responsive column-80">
            <div class="historiaClinica view content">
                <h3> Datos de La Historia Clinica </h3>
                <table>
                    <tr>
                        <th><?= __('Fecha (Dia/Mes/Año)') ?></th>
                        <td><?= h($historia->HisCliDia) ?>/<?= h($historia->HisCliMes) ?>/<?= h($historia->HisCliAno) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Aceptación del Odontólogo') ?></th>
                        <td><?= $historia->HisCliOdoAce ? __('Sí') : __('No'); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Aceptación del Paciente') ?></th>
                        <td><?= $historia->HisCliPacAce ? __('Sí') : __('No'); ?></td>
                    </tr>
                </table>
                <!-- <br>
                <div style="text-align: center;">

                    <?= $this->Html->link(__('Editar Historia Clínica'), ['controller' => 'HistoriaClinica', 'action' => 'edit', $historia->HisCliCod], ['class' => 'button']) ?>
                </div> -->

            </div>
        </div>
<br>


        <div class="column-responsive column-80">
            <div class="historiaMedica view content">
                <h3>Historia Medica</h3>
                <?php if ($historia->historia_medica): ?>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th><?= __('Código de Historia Médica') ?></th>
                                <td><?= $this->Number->format($historia->historia_medica->HisMedCod) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Problemas Cardíacos') ?></th>
                                <td><?= $historia->historia_medica->HisMedProCar ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Enfermedades Renales') ?></th>
                                <td><?= $historia->historia_medica->HisMedEnfRen ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Diabetes') ?></th>
                                <td><?= $historia->historia_medica->HisMedDia ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Hipertensión') ?></th>
                                <td><?= $historia->historia_medica->HisMedHip ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Epilepsia') ?></th>
                                <td><?= $historia->historia_medica->HisMedEpi ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('VIH') ?></th>
                                <td><?= $historia->historia_medica->HisMedVIH ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Hepatitis') ?></th>
                                <td><?= $historia->historia_medica->HisMedHep ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Problemas Respiratorios') ?></th>
                                <td><?= $historia->historia_medica->HisMedPro ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Alergias') ?></th>
                                <td><?= $historia->historia_medica->HisMedAle ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Problemas de Coagulación') ?></th>
                                <td><?= $historia->historia_medica->HisMedProCoa ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Toma de Medicamentos') ?></th>
                                <td><?= $historia->historia_medica->HisMedTomMed ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Embarazo') ?></th>
                                <td><?= $historia->historia_medica->HisMedEmb ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Problemas Traumáticos Dentales') ?></th>
                                <td><?= $historia->historia_medica->HisMedProTraDen ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Hábitos') ?></th>
                                <td><?= $historia->historia_medica->HisMedHab ? __('Sí') : __('No'); ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Específicos') ?></th>
                                <td><?= $historia->historia_medica->HisMedEsp ? __('Sí') : __('No'); ?></td>
                            </tr>
                        </table>
                        <!-- <br>
                <div style="text-align: center;">

                    <?= $this->Html->link(__('Editar Historia Medica'), ['controller' => 'HistoriaMedica', 'action' => 'edit', $historia->historia_medica->HisMedCod], ['class' => 'button']) ?>
                </div> -->
                    </div>
                <?php else: ?>
                    <p>No hay información de historia médica disponible.</p>
                <?php endif; ?>
            </div>
        </div>
        <br>

<?php if ($historia->tratamiento): ?>
    <div class="tratamiento view content">
        <h3>Tratamiento -  <?= h($historia->tratamiento->TraCod) ?></h3>
        <p><strong>Descripción:</strong> <?= h($historia->tratamiento->TraDes) ?></p>
        <?php if (!empty($historia->tratamiento->detalle_tratamiento)): ?>
            <h4>Detalles del Tratamiento</h4>
            <!-- <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?= __('Código de Detalle') ?></th>
                            <th><?= __('Cantidad') ?></th>
                            <th><?= __('Costo Unitario') ?></th>
                            <th><?= __('Costo Total') ?></th>
                            <th><?= __('Estado del Tratamiento') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historia->tratamiento->detalle_tratamiento as $detalle): ?>
                            <tr>
                                <td><?= h($detalle->DetTraCod) ?></td>
                                <td><?= h($detalle->DetTraCan) ?></td>
                                <td><?= h($detalle->DetTraCosUni) ?></td>
                                <td><?= h($detalle->DetTraCosTot) ?></td>
                                <td><?= h($detalle->DetTraEst) ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <div style="text-align: center;">
                <?= $this->Html->link(__('Agregar un nuevo Detalle'), ['controller' => 'DetalleTratamiento', 'action' => 'add'], ['class' => 'button']) ?>
            </div> -->
            </table>

<br>

            </div>
        <?php else: ?>

            <p>No hay detalles del tratamiento disponibles.</p><br>
            <!-- <div style="text-align: center;">
            <?= $this->Html->link(__('Agregar un nuevo Detalle'), ['controller' => 'DetalleTratamiento', 'action' => 'add'], ['class' => 'button']) ?>
            </div> -->
        <?php endif; ?>

    </div>
<?php else: ?>
    <p>No hay información de tratamiento disponible.</p><br>
    <!-- <div style="text-align: center;">
    <?= $this->Html->link(__('Agregar un nuevo Tratamiento'), ['controller' => 'Tratamiento', 'action' => 'add'], ['class' => 'button']) ?>
    </div> -->
<?php endif; ?>

<br>

<?php if ($historia->odontograma): ?>
    <!-- Mostrar detalles de Odontograma si están disponibles -->
    <div class="odontograma view content">
        <h3>Odontograma - <?= h($historia->odontograma->OdxCod) ?></h3>

        <?php if (!empty($historia->odontograma->odontograma_detalles)): ?>
            <h4>Detalles del Odontograma</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><?= __('Descripcion') ?></th>
                            <th><?= __('Codigo de Detalle') ?></th>
                            <th><?= __('Numero de Detalle') ?></th>
                            <th><?= __('Numero de Diente') ?></th>
                            <th><?= __('Vestibular') ?></th>
                            <th><?= __('Palatino') ?></th>
                            <th><?= __('Lingual') ?></th>
                            <th><?= __('Derecha') ?></th>
                            <th><?= __('Izquierda') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($historia->odontograma->odontograma_detalles as $detalle): ?>
                            <tr>
                                <td><?= h($detalle->OdxDetDes) ?></td>
                                <td><?= h($detalle->OdxDetCod) ?></td>
                                <td><?= h($detalle->OdxDetNum) ?></td>
                                <td><?= h($detalle->OdxDetNumDie) ?></td>
                                <td><?= h($detalle->OdxDetVes) ? __('Sí') : __('No'); ?></td>
                                <td><?= h($detalle->OdxDetPal) ? __('Sí') : __('No'); ?></td>
                                <td><?= h($detalle->OdxDetLin) ? __('Sí') : __('No'); ?></td>
                                <td><?= h($detalle->OdxDetDer) ? __('Sí') : __('No'); ?></td>
                                <td><?= h($detalle->OdxDetIzq) ? __('Sí') : __('No'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <!-- <div style="text-align: center;">
                    <?= $this->Html->link(__('Agregar un nuevo Detalle'), ['controller' => 'odontograma_detalle', 'action' => 'add'], ['class' => 'button']) ?>
                    </div> -->
                </table>
            </div>
        <?php else: ?>
            <p>No hay detalles de Odontograma disponibles.</p><br>
            <!-- <div style="text-align: center;">
                <?= $this->Html->link(__('Agregar un nuevo Detalle'), ['controller' => 'odontograma_detalle', 'action' => 'add'], ['class' => 'button']) ?>
            </div> -->
        <?php endif; ?>

    </div>

<?php else: ?>
    <p>No hay información de Odontograma disponible.</p><br>
    <!-- <div style="text-align: center;">
    <?= $this->Html->link(__('Agregar un nuevo Odontograma'), ['controller' => 'Odontograma', 'action' => 'add'], ['class' => 'button']) ?>
    </div> -->
<?php endif; ?>
<br>

        <?php if (!empty($historia->historial_trabajo)): ?>
            <div class="historialTrabajo view content">
                <div class="table-responsive">
                <h3>Historial de Trabajo</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><?= __('Código') ?></th>
                                <th><?= __('Nombre del Odontologo') ?></th>
                                <th><?= __('Laboratorio') ?></th>
                                <th><?= __('Trabajo') ?></th>
                                <th><?= __('Fecha (Dia/Mes/Año)') ?></th>
                                <th><?= __('A cuenta') ?></th>
                                <th><?= __('Saldo') ?></th>
                                <th><?= __('Firma del Paciente') ?></th>
                                <th><?= __('Observaciones') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($historia->historial_trabajo as $historialTrabajo): ?>
                            <tr>
                                <td><?= $this->Number->format($historialTrabajo->HisTraCod) ?></td>
                                <td><?= h($historialTrabajo->HisTraDocNom) ?></td>
                                <td><?= $historialTrabajo->HisTraLab ? __('Sí') : __('No'); ?></td>
                                <td><?= h($historialTrabajo->HisTraTra) ?></td>
                                <td><?= h($historialTrabajo->HisTraFecDia . ' / ' . $historialTrabajo->HisTraFecMes . ' / ' . $historialTrabajo->HisTraFecAno) ?></td>
                                <td><?= h($historialTrabajo->HisTraAcu) ?></td>
                                <td><?= h($historialTrabajo->HisTraSal) ?></td>
                                <td><?= $historialTrabajo->HisTraFirPac ? __('Sí') : __('No'); ?></td>
                                <td><?= h($historialTrabajo->HisTraObs) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <!-- <div style="text-align: center;">
                    <?= $this->Html->link(__('Agregar un nuevo Trabajo'), ['controller' => 'historialTrabajo', 'action' => 'add'], ['class' => 'button']) ?>
                    </div> -->
                </table>
            </div>
        </div>
        <?php else: ?>
            <p>No hay historial de trabajo disponible.</p><br>
            <!-- <div style="text-align: center;">
            <?= $this->Html->link(__('Agregar un nuevo Trabajo'), ['controller' => 'historialTrabajo', 'action' => 'add'], ['class' => 'button']) ?>
            </div> -->
        <?php endif; ?>
    <br>
    <div style="text-align: center;">
    <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => 'button']) ?>
    </div>
</div>
