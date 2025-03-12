export function setupFormValidation() {
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("rentalForm");

    form.addEventListener("submit", function (event) {
      let isValid = true;

      function validateField(field, condition, message) {
        if (condition) {
          field.classList.add("is-invalid");
          isValid = false;
        } else {
          field.classList.remove("is-invalid");
        }
      }

      const nameInput = document.getElementById("name");
      validateField(
        nameInput,
        nameInput.value.trim().length < 3,
        "El nombre debe tener al menos 3 caracteres."
      );

      const emailInput = document.getElementById("email");
      const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
      validateField(
        emailInput,
        !emailPattern.test(emailInput.value.trim()),
        "Ingrese un correo válido."
      );

      const phoneInput = document.getElementById("phone");
      const phonePattern = /^\d{10}$/;
      validateField(
        phoneInput,
        !phonePattern.test(phoneInput.value.trim()),
        "Ingrese un número de 10 dígitos."
      );

      const kartTypeInput = document.getElementById("kart_type");
      validateField(
        kartTypeInput,
        !kartTypeInput.value,
        "Seleccione un modelo de kart."
      );

      const timeInput = document.getElementById("rental_time");
      validateField(
        timeInput,
        timeInput.value < 10 || timeInput.value > 120,
        "Debe ser entre 10 y 120 minutos."
      );

      if (!isValid) {
        event.preventDefault();
      }
    });

    document.querySelectorAll(".form-control").forEach((input) => {
      input.addEventListener("input", function () {
        this.classList.remove("is-invalid");
      });
    });
  });
}
