<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/login&register.css')); ?>">

    <div class="container mt-4 admin-form-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header cesae-purple text-white">
                        <h4 class="mb-0">Criar Nova Conta</h4>
                    </div>
                    <div class="card-body">
                        <?php if(session('message')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('message')); ?>

                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('users.create')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <!-- coluna da esquerda -->
                                <div class="col-md-6">
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Nome: </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="<?php echo e(old('name')); ?>">
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Nome inválido</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label class="form-label">Email: </label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email de aluno do CESAE" value="<?php echo e(old('email')); ?>">
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Email inválido</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label class="form-label">Password: </label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Password inválida</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label class="form-label">Curso que frequentas: </label>
                                        <input type="text" class="form-control" id="course" name="course"
                                            value="<?php echo e(old('course')); ?>">
                                        <?php $__errorArgs = ['course'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Curso inválido</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label class="form-label">Data de conclusão do curso: </label>
                                        <input type="date" class="form-control" id="completion_date"
                                            name="completion_date" value="<?php echo e(old('completion_date')); ?>">
                                        <?php $__errorArgs = ['completion_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Data inválida</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <!-- Coluna da direita -->
                                <div class="col-md-6">
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Horário: </label>
                                        <select class="form-select" name="Schedule" id="Schedule">
                                            <option value="0" <?php echo e(old('Schedule') == '0' ? 'selected' : ''); ?>>Laboral
                                            </option>
                                            <option value="1" <?php echo e(old('Schedule') == '1' ? 'selected' : ''); ?>>
                                                Pós-Laboral</option>
                                        </select>
                                        <?php $__errorArgs = ['Schedule'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Escolha inválida</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label class="form-label">Boleia: </label>
                                        <select class="form-select" name="have_car" id="have_car">
                                            <option value="0" <?php echo e(old('have_car') == '0' ? 'selected' : ''); ?>>Quero
                                                boleia</option>
                                            <option value="1" <?php echo e(old('have_car') == '1' ? 'selected' : ''); ?>>Quero dar
                                                boleia</option>
                                        </select>
                                        <?php $__errorArgs = ['have_car'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Escolha inválida</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label class="form-label">Código postal: </label>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" class="form-control" id="Postcode_first4"
                                                    name="Postcode_first4" maxlength="4"
                                                    value="<?php echo e(old('Postcode_first4')); ?>" placeholder="0000">
                                            </div>
                                            <div class="col-1 text-center pt-2">-</div>
                                            <div class="col-5">
                                                <input type="text" class="form-control" id="Postcode_last3"
                                                    name="Postcode_last3" maxlength="3"
                                                    value="<?php echo e(old('Postcode_last3')); ?>" placeholder="000">
                                            </div>
                                        </div>
                                        <?php $__errorArgs = ['Postcode_first4'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Primeiros 4 dígitos inválidos</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <?php $__errorArgs = ['Postcode_last3'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Últimos 3 dígitos inválidos</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label class="form-label">Foto de perfil: </label>
                                        <input type="file" class="form-control" id="photo" name="photo"
                                            accept="image/*">
                                        <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-danger">Foto inválida</p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label">Dias em que planeias usar o serviço: </label>
                                <div class="row row-cols-5 g-2">
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="monday"
                                                name="monday" <?php echo e(old('monday') ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="monday">Segunda</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="tuesday"
                                                name="tuesday" <?php echo e(old('tuesday') ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="tuesday">Terça</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="wednesday"
                                                name="wednesday" <?php echo e(old('wednesday') ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="wednesday">Quarta</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="thursday"
                                                name="thursday" <?php echo e(old('thursday') ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="thursday">Quinta</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="friday"
                                                name="friday" <?php echo e(old('friday') ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="friday">Sexta</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="cb_accept" name="cb_accept"
                                    <?php echo e(old('cb_accept') ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="cb_accept">Aceito os termos e condições de
                                    uso.</label>
                                <?php $__errorArgs = ['cb_accept'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="text-danger">É necessário aceitar os termos</p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn cesae-blue">Criar Conta</button>
                            </div>

                            <div class="mt-3 text-center">
                                <p>Já tens uma conta? <a href="<?php echo e(route('login')); ?>">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\marco\OneDrive\Ambiente de Trabalho\CESAE\CESAE_Projeto_Final\ProjetoFinal\resources\views/auth/register.blade.php ENDPATH**/ ?>