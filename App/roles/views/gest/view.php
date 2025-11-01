<!-- App/roles/views/gest/view.php -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h3 class="mb-0">Rol details: <?= htmlspecialchars($role->role_name) ?></h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Descripción</h5>
                    <p class="card-text mb-4">
                        <?= htmlspecialchars($role->role_description) ?>
                    </p>

                    <hr>

                    <h5 class="card-title mt-4">Permisos Asignados</h5>
                    <p class="text-muted">Esta es una lista de solo lectura de las acciones que este rol puede realizar.</p>

                    <?php if (!empty($permissions)) : ?>
                        <div class="list-group">
                            <?php foreach ($permissions as $permission) : ?>
                                <div class="list-group-item">
                                    <strong><?= htmlspecialchars(ucwords(str_replace('-', ' ', $permission['permission_name']))) ?></strong>
                                    <br>
                                    <small class="text-muted"><?= htmlspecialchars($permission['permission_desc']) ?></small>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            Este rol no tiene ningún permiso asignado actualmente.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-footer text-end">
                    <a href="/roles/gest/start" class="btn btn-primary">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
</div>
