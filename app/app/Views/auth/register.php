<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Register</h2>

            <form method="post" action="/register" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
                <?= session('errors.avatar') ?>


                <div class="form-group">
                    <label for="firstname">Vorname</label>
                    <input type="text" name="firstname" class="form-control <?= (isset($validation) && $validation->hasError('firstname')) ? 'is-invalid' : '' ?>"
                        value="<?= old('firstname') ?>" required>
                    <?php if (isset($validation) && $validation->hasError('firstname')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('firstname') ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="lastname">Nachname</label>
                    <input type="text" name="lastname" class="form-control <?= (isset($validation) && $validation->hasError('lastname')) ? 'is-invalid' : '' ?>"
                        value="<?= old('lastname') ?>" required>
                    <?php if (isset($validation) && $validation->hasError('lastname')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('lastname') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control <?= (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : '' ?>"
                        value="<?= old('email') ?>" required>
                    <?php if (isset($validation) && $validation->hasError('email')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('email') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control <?= (isset($validation) && $validation->hasError('password')) ? 'is-invalid' : '' ?>" required>
                    <?php if (isset($validation) && $validation->hasError('password')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="password_confirm">Passwort bestätigen</label>
                    <input type="password" name="password_confirm" class="form-control <?= (isset($validation) && $validation->hasError('password_confirm')) ? 'is-invalid' : '' ?>" required>
                    <?php if (isset($validation) && $validation->hasError('password_confirm')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password_confirm') ?>
                        </div>
                    <?php endif; ?>
                </div>


                <div class="form-group">
                    <label class="form-label">Avatar Image</label>
                    <input type="file" name="avatar" class="form-control <?= (isset($validation) && $validation->hasError('avatar')) ? 'is-invalid' : '' ?>">
                    <?php if (isset($validation) && $validation->hasError('avatar')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('avatar') ?>
                        </div>
                    <?php endif; ?>
                </div>


                <button type="submit" class="btn btn-primary btn-block">Registrieren</button>
            </form>

            <div class="text-center mt-3">
            Sie haben kein Konto? <a href="/login">Hier anmelden</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>