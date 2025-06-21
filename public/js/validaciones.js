document.addEventListener('DOMContentLoaded', function() {
    // Función para mostrar errores de validación
    function showError(input, message) {
        const formGroup = input.closest('.form-group') || input.closest('.mb-3');
        const errorElement = formGroup.querySelector('.invalid-feedback') || document.createElement('div');
        
        errorElement.className = 'invalid-feedback';
        errorElement.textContent = message;
        
        if (!formGroup.querySelector('.invalid-feedback')) {
            formGroup.appendChild(errorElement);
        }
        
        input.classList.add('is-invalid');
    }
    
    // Función para limpiar errores
    function clearError(input) {
        const formGroup = input.closest('.form-group') || input.closest('.mb-3');
        const errorElement = formGroup.querySelector('.invalid-feedback');
        
        if (errorElement) {
            errorElement.remove();
        }
        
        input.classList.remove('is-invalid');
    }
    
    // Validación en tiempo real
    document.querySelectorAll('input[required], select[required], textarea[required]').forEach(input => {
        input.addEventListener('input', function() {
            if (this.value.trim() === '') {
                showError(this, 'Este campo es requerido');
            } else {
                clearError(this);
                
                // Validaciones específicas
                if (this.type === 'number' && isNaN(this.value)) {
                    showError(this, 'Debe ser un número válido');
                }
            }
        });
    });
    
    // Validación al enviar el formulario
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validar campos requeridos
            this.querySelectorAll('[required]').forEach(input => {
                if (input.value.trim() === '') {
                    showError(input, 'Este campo es requerido');
                    isValid = false;
                }
                
                // Validación especial para números
                if (input.type === 'number' && isNaN(input.value)) {
                    showError(input, 'Debe ser un número válido');
                    isValid = false;
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                
                // Mostrar alerta solo si hay errores visibles
                const firstInvalid = this.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.focus();
                }
            } else {
                // Guardar datos en localStorage si es necesario
                if (this.id === 'petForm') {
                    const owner = document.getElementById('owner_name').value;
                    localStorage.setItem('last_owner', owner);
                }
            }
        });
    });
    
    // Recuperar último dueño de localStorage
    const lastOwner = localStorage.getItem('last_owner');
    if (lastOwner) {
        const ownerInput = document.getElementById('owner_name');
        if (ownerInput) {
            ownerInput.value = lastOwner;
        }
    }
});