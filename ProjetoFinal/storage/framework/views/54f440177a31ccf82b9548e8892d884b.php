<div class="modal fade" id="settingsModal" tabindex="-1" aria-labelledby="settingsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title cesae-purple" id="settingsModalLabel">Definições de Utilizador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="settingsForm" action="<?php echo e(route('settings.update')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <!-- Toggle de "ocupado" -->
            <div class="mb-4 form-check form-switch">
              <input class="form-check-input" type="checkbox" id="busyToggle" name="is_busy" value="1"
                <?php echo e(auth()->user()->is_busy ? 'checked' : ''); ?>

                onchange="toggleDays(this.checked)">
              <label class="form-check-label fw-bold" for="busyToggle">
                Estou Indisponível
              </label>
              <div class="form-text text-muted">
                Quando ativado, serás marcado como indisponível e não aparecerás nos resultados de matches.
              </div>
            </div>

            <hr>

            <div class="mb-3" id="daysSection" <?php echo e(auth()->user()->is_busy ? 'style="opacity: 0.5;"' : ''); ?>>
              <label class="form-label">Dias disponíveis para boleias:</label>
              <div class="form-check">
                <input class="form-check-input day-checkbox" type="checkbox" name="dias[segunda]" value="1" id="dia1"
                  <?php echo e(in_array(1, $userDays ?? []) ? 'checked' : ''); ?>

                  <?php echo e(auth()->user()->is_busy ? 'disabled' : ''); ?>>
                <label class="form-check-label" for="dia1">Segunda-feira</label>
              </div>
              <div class="form-check">
                <input class="form-check-input day-checkbox" type="checkbox" name="dias[terca]" value="1" id="dia2"
                  <?php echo e(in_array(2, $userDays ?? []) ? 'checked' : ''); ?>

                  <?php echo e(auth()->user()->is_busy ? 'disabled' : ''); ?>>
                <label class="form-check-label" for="dia2">Terça-feira</label>
              </div>
              <div class="form-check">
                <input class="form-check-input day-checkbox" type="checkbox" name="dias[quarta]" value="1" id="dia3"
                  <?php echo e(in_array(3, $userDays ?? []) ? 'checked' : ''); ?>

                  <?php echo e(auth()->user()->is_busy ? 'disabled' : ''); ?>>
                <label class="form-check-label" for="dia3">Quarta-feira</label>
              </div>
              <div class="form-check">
                <input class="form-check-input day-checkbox" type="checkbox" name="dias[quinta]" value="1" id="dia4"
                  <?php echo e(in_array(4, $userDays ?? []) ? 'checked' : ''); ?>

                  <?php echo e(auth()->user()->is_busy ? 'disabled' : ''); ?>>
                <label class="form-check-label" for="dia4">Quinta-feira</label>
              </div>
              <div class="form-check">
                <input class="form-check-input day-checkbox" type="checkbox" name="dias[sexta]" value="1" id="dia5"
                  <?php echo e(in_array(5, $userDays ?? []) ? 'checked' : ''); ?>

                  <?php echo e(auth()->user()->is_busy ? 'disabled' : ''); ?>>
                <label class="form-check-label" for="dia5">Sexta-feira</label>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-primary" onclick="document.getElementById('settingsForm').submit();">Guardar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function toggleDays(isBusy) {
      const dayCheckboxes = document.querySelectorAll('.day-checkbox');
      const daysSection = document.getElementById('daysSection');

      // Se ocupado/busy, desativa as checkboxes dos dias e limpa-as
      if (isBusy) {
        dayCheckboxes.forEach(checkbox => {
          checkbox.checked = false;
          checkbox.disabled = true;
        });
        daysSection.style.opacity = '0.5';
      } else {
        // Se desocupado, ativa as checkboxes
        dayCheckboxes.forEach(checkbox => {
          checkbox.disabled = false;
        });
        daysSection.style.opacity = '1';
      }
    }
  </script>
<?php /**PATH C:\Users\marco\OneDrive\Ambiente de Trabalho\CESAE\CESAE_Projeto_Final\ProjetoFinal\resources\views/settings_modal.blade.php ENDPATH**/ ?>