<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Stackverify Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(to right, #0f0f0f, #4b0082);
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
    }
    .glass {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(15px);
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
    }
    input, button {
      backdrop-filter: blur(5px);
    }
    .form-label {
      font-weight: 600;
    }
    #error {
      color: #ff4c4c;
    }
  </style>
</head>
<body class="flex items-center justify-center px-4 py-12">
  <div class="glass p-8 w-full max-w-md text-white">
    <h2 class="text-3xl font-bold text-center mb-6">stackverify Register</h2>

    <div class="mb-4">
      <label class="form-label">Username</label>
      <input type="text" id="username" class="form-control bg-dark text-white" required />
    </div>

    <div class="mb-4">
      <label class="form-label">Email</label>
      <input type="email" id="email" class="form-control bg-dark text-white" required />
    </div>

    <div class="mb-4">
      <label class="form-label">Phone</label>
      <input type="text" id="phone" class="form-control bg-dark text-white" required />
    </div>

    <div class="mb-4">
      <label class="form-label">Password</label>
      <input type="password" id="password" class="form-control bg-dark text-white" required />
    </div>

    <button id="sendOtpBtn" class="btn btn-danger w-100 shadow mt-3">Send OTP</button>

    <div id="otpSection" class="mt-4 hidden">
      <label class="form-label">Enter OTP</label>
      <input type="text" id="otp" maxlength="6" class="form-control bg-dark text-white" />
      <button id="verifyOtpBtn" class="btn btn-outline-light w-100 mt-3">Verify & Register</button>
    </div>

    <p id="error" class="text-sm mt-3 text-center"></p>
  </div>

  <script>
    const sendOtpBtn = document.getElementById("sendOtpBtn");
    const verifyOtpBtn = document.getElementById("verifyOtpBtn");
    const otpSection = document.getElementById("otpSection");
    const error = document.getElementById("error");

    const getFormData = () => {
      return {
        username: document.getElementById("username").value.trim(),
        email: document.getElementById("email").value.trim(),
        phone: document.getElementById("phone").value.trim(),
        password: document.getElementById("password").value.trim(),
      };
    };

    const showError = (msg) => {
      error.textContent = msg;
    };

    sendOtpBtn.addEventListener("click", async () => {
      const formData = getFormData();
      if (!formData.username || !formData.email || !formData.phone || !formData.password) {
        showError("❗ Please fill all fields.");
        return;
      }

      showError("Sending OTP...");
      try {
        const res = await fetch("https://verify-email-api-ma40.onrender.com/request-code", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({
            company: "Stackverify",
            username: formData.username,
            email: formData.email
          })
        });

        const data = await res.json();
        if (data.message && data.message.includes("sent")) {
          otpSection.classList.remove("hidden");
          window._formData = formData;
          showError("✅ OTP sent to your email!");
        } else {
          showError(data.message || "❌ Failed to send OTP.");
        }
      } catch (e) {
        showError("❌ Error contacting OTP service.");
      }
    });

    verifyOtpBtn.addEventListener("click", async () => {
      const code = document.getElementById("otp").value.trim();
      const email = window._formData?.email;

      if (!email || !code || code.length !== 6) {
        showError("⚠️ Enter a valid 6-digit OTP.");
        return;
      }

      showError("Verifying OTP...");
      try {
        const res = await fetch("https://verify-email-api-ma40.onrender.com/verify-code", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify({ email, code })
        });

        const data = await res.json();
        if (data.valid === true) {
          showError("✅ OTP verified! Registering...");
          await registerUser(window._formData);
        } else {
          showError(data.message || "❌ Invalid or expired OTP.");
        }
      } catch (e) {
        showError("❌ Error verifying OTP.");
      }
    });

    async function registerUser(formData) {
      try {
        const res = await fetch("/backend/register.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json"
          },
          body: JSON.stringify(formData)
        });

        const data = await res.json();
        if (data.success) {
          alert("🎉 Registration successful! Welcome to stackverify.");
          window.location.href = "signin.php";
        } else {
          showError(data.error || "❌ Registration failed.");
        }
      } catch (e) {
        showError("❌ Server error during registration.");
      }
    }
  </script>
</body>
</html>