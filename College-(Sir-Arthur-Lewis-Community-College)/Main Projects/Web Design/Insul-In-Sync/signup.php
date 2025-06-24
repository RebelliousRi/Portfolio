<?php

include_once 'includes/config.php';

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insul-In-Sync Sign Up Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      #hide {
        opacity: 0;
      }
      .patient-only {
        display: none;
      }
      .caregiver-only {
        display: none;
      }
    </style>

<link rel="stylesheet" href="styles.css">

</head>

<script>
function toggleFormFields() {
    const accountType = document.querySelector('input[name="acctype"]:checked').value;
    
    const patientFields = document.querySelectorAll('.patient-only');
    const caregiverFields = document.querySelectorAll('.caregiver-only');
  

    if (accountType === 'patient') {
        patientFields.forEach(field => {
            field.style.display = 'block';
            // Enable validation for patient fields
            field.querySelectorAll('input, select, textarea').forEach(input => {
                input.required = true;
                input.disabled = false;
            });
        });
        caregiverFields.forEach(field => {
            field.style.display = 'none';
            // Disable validation for caregiver fields
            field.querySelectorAll('input, select, textarea').forEach(input => {
                input.required = false;
                input.disabled = true;
            });
        });
    } else if (accountType === 'care_giver') {
        patientFields.forEach(field => {
            field.style.display = 'none';
            // Disable validation for patient fields
            field.querySelectorAll('input, select, textarea').forEach(input => {
                input.required = false;
                input.disabled = true;
            });
        });
        caregiverFields.forEach(field => {
            field.style.display = 'block';
            // Enable validation for caregiver fields
            field.querySelectorAll('input, select, textarea').forEach(input => {
                input.required = true;
                input.disabled = false;
            });
        });
    }
}

 document.addEventListener('DOMContentLoaded', function() {

    const radioButtons = document.querySelectorAll('input[name="acctype"]');
    
    radioButtons.forEach(radio => {
        radio.addEventListener('change', function() {          
            toggleFormFields();
        });
    });
    
    // Trigger initial state
    toggleFormFields();
});

// Handle form submission
document.querySelector('form').addEventListener('submit', function(e) {
    const accountType = document.querySelector('input[name="acctype"]:checked').value;
    const form = this;
    
    // Enable all fields before submission
    form.querySelectorAll('input, select, textarea').forEach(input => {
        input.disabled = false;
    });
    
    // Validate only the fields for the selected account type
    if (accountType === 'patient') {
        form.querySelectorAll('.caregiver-only input, .caregiver-only select, .caregiver-only textarea').forEach(input => {
            input.required = false;
            input.disabled = true;
        });
    } else {
        form.querySelectorAll('.patient-only input, .patient-only select, .patient-only textarea').forEach(input => {
            input.required = false;
            input.disabled = true;
        });
    }
});
</script>


  <body>

  <nav id="navbar">
  <div class="logo">
    <a href="index1.php"><img src="logo.png"></a>
    <a href="index1.php">Insul-In-Sync</a>
  </div>
  <ul>
        <li><a href="about.php">About Us</a></li>
    <li><a href="education.php">Education</a></li>
    <li><a href="contact.php">Contact Medical Services</a></li>

    <?php
if (isset($_SESSION['username'])) {
    echo <<<HTML
    <li class="dropdown">
        <a href="#">Tools</a>
        <div class="dropdown-content">
            <a href="pressure.php">Blood Pressure Log</a>
            <a href="glucose.php">Blood Glucose Log</a>
            <a href="cholesterol.php">Blood Cholesterol Log</a>
            <a href="schedule.php">Schedule</a>
        </div>
    </li> 

    <li class="dropdown">
        <a href="#">Account</a>
        <div class="dropdown-content">
HTML;
        
        if ($_SESSION['acctype'] == 'patient') {
            echo ' <a href="data_access.php">Data Access</a>';
        }

        if ($_SESSION['acctype'] == 'care_giver') {
            echo '<a href="care_giver_access.php">Patient Data</a>';
        }

        echo <<<HTML
            <a href="includes/logout.php">Log Out</a>
        </div>
    </li>
    HTML;
}
?>

<?php
if (!isset($_SESSION['username'])) {
    echo <<<HTML
    <li><a href="login.php">Log In</a></li>
        <li><a href="signup.php">Sign Up</a></li>
    HTML;
}
?>

  </ul>
</nav>


    <div class="container" width="100%">
      <h2>Sign Up</h2>
      <form method="POST" action="includes/signup.php">

      <fieldset>
          <legend><h3>Account Information</h3></legend>
          <table width="100%" cellpadding="10">
            <tr align="center">
            <td width="33.3%">
              <label for="acctype" style="display: block; margin-bottom: 20px;">Account type:</label>
              <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                <label for="patient">
                  <input type="radio" id="patient" name="acctype" value="patient" checked required />
                  Patient
                </label>
                
                <label for="care_giver">
                  <input type="radio" id="care_giver" name="acctype" value="care_giver" />
                  Care Giver
                </label>
              </div>
            </td>
            <td width="33.3">
              <label for="username">Username:</label> <br /><br /><input
                required
                maxlength="20"
                placeholder="Enter your username"
                type="text"
                name="username"
              />
              <br><br>
            </td>
            <td width="33.3">
              <label for="pwd">Password:</label> <br /><br /><input
                required
                placeholder="Enter your password"
                type="password"
                name="pwd"
              />
              <br><br>
            </td>
            </tr>
          </table>
        </fieldset>

        <fieldset>
          <legend><h3>Basic Information</h3></legend>
          <table width="100%" cellpadding="10">
            <tr align="center">
              <td width="33.3">
                <label for="firstname">First name:</label> <br /><br /><input
                  required
                  maxlength="20"
                  placeholder="Enter your first name"
                  type="text"
                  name="firstname"
                />
                <br><br>
              </td>
              <td width="33.3">
                <label for="lastname">Last name: </label><br /><br /><input
                  required
                  maxlength="20"
                  placeholder="Enter your last name"
                  type="text"
                  name="lastname"
                />
                <br><br>
              </td>
              <td width="33.3">
                <label for="gender" style="display: block; margin-bottom: 20px;">Gender:</label>
                <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                  <label for="male" style="margin-right: 10px;">
                    <input type="radio" id="male" name="gender" value="male" required>
                    Male
                  </label>
                  <label for="female">
                    <input type="radio" id="female" name="gender" value="female">
                    Female
                  </label>
                </div>
              </td>
            </tr>
          </table>
        </fieldset>

        <!-- Patient-specific fields -->
        <fieldset class="patient-only">
          <legend><h3>Patient Information</h3></legend>
          <table width="100%" cellpadding="10">
            <tr align="center">
              <td width="33.3">
                <br>
                <div style="margin-top: 10px; margin-left: 50px; margin-right: 20px;">
                  <label for="dob">Birth date:</label><br /><br />
                  <input required type="date" name="dob" />
                  <br /><br />
                  <br />
                </div>
              </td>

              <td width="33.3">
                <br>
                <label for="insulin" style="display: block; margin-bottom: 20px;">Insulin dependent:</label>
                <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                  <label for="yes" style="margin-right: 10px;">
                    <input type="radio" id="yes" name="insulin" value="yes" required>
                    Yes
                  </label>
                  <label for="no">
                    <input type="radio" id="no" name="insulin" value="no">
                    No
                  </label>
                </div>
              </td>

              <td width="33.3">
                <label for="type">Diabetes type:</label><br /><br />
                <select name="type" required>
                  <option value="type1">Type 1 Diabetes</option>
                  <option value="type2">Type 2 Diabetes</option>
                  <option value="typegest">Gestational Diabetes</option>
                  <option value="typepre">Pre Diabetes</option>
                </select>
              </td>
            </tr>

            <tr align="center">
              <td width="33.3">
                <label for="height">Height:</label><br /><br />
                <input required type="number" name="height" step="0.01" placeholder="Enter in feet"/>
              </td>

              <td width="33.3">
                <label for="weight">Weight:</label><br /><br />
                <input required type="number" name="weight" step="0.01" placeholder="Enter in pounds"/>
              </td>

              <td width="33.3">
                <label for="conditions">Other conditions:</label> <br /><br />
                <textarea required rows="1" cols="20" placeholder="Enter any other conditions" name="conditions"></textarea>
              </td>
            </tr>
          </table>
        </fieldset>

        <!-- Caregiver-specific fields -->
        <fieldset class="caregiver-only">
          <legend><h3>Caregiver Information</h3></legend>
          <table width="100%" cellpadding="10">
            <tr align="center">
              <td width="33.3">
                <label for="qualification">Qualification:</label><br /><br />
                <select name="qualification" required>
                  <option value="">Select qualification</option>
                  <option value="nurse">Registered Nurse</option>
                  <option value="doctor">Medical Doctor</option>
                  <option value="family">Family Member</option>
                  <option value="other">Other</option>
                </select>
              </td>

              <td width="33.3">
                <label for="experience">Years of Experience:</label><br /><br />
                <input type="number" name="experience" min="0" required placeholder="Enter years of experience"/>
              </td>

              <td width="33.3">
                <label for="specialization">Specialization:</label><br /><br />
                <input type="text" name="specialization" required placeholder="Enter your specialization"/>
              </td>
            </tr>
          </table>
        </fieldset>

        <!-- Common fields for both types -->
        <fieldset>
          <legend><h3>Contact Information</h3></legend>
          <table width="100%" cellpadding="10">
            <tr align="center">
              <td width="33.3">
                <label for="address">Address:</label> <br /><br />
                <textarea required rows="1" cols="20" placeholder="Enter your address" name="address"></textarea>
              </td>
              <td width="33.3">
                <label for="email">Email address:</label> <br /><br />
                <input required placeholder="johndoe@example.com" type="email" name="email"/>
              </td>
              <td width="33.3">
                <label for="phone">Phone number: </label> <br /><br />
                <input required placeholder="0 (123) 456-7890" type="text" name="phone"/>
              </td>
            </tr>
          </table>
        </fieldset>

        <fieldset class="patient-only">
          <legend><h3>Emergency Contact Information</h3></legend>
          <table width="100%" cellpadding="10">
            <tr align="center">
              <td width="33.3">
                <label for="em_name">Name:</label> <br /><br />
                <input required placeholder="Enter their full name" type="text" name="em_name"/>
              </td>              
              <td width="33.3">
                <label for="em_address">Address:</label> <br /><br />
                <textarea required rows="1" cols="20" placeholder="Enter their address" name="em_address"></textarea>
              </td>
              <td width="33.3">
                <label for="em_phone">Phone number:</label> <br /><br />
                <input required placeholder="0 (123) 456-7890" type="text" name="em_phone"/>
              </td>
            </tr>
          </table>
        </fieldset>

        <table width="100%" cellpadding="10">
          <tr align="center">
            <td width="50">
              <input type="text" id="hide" /> <br /><br />
              <input type="reset" value="Reset" name="reset" />
              <br /><br />
              <input type="text" id="hide" />
            </td>
            <td width="50">
              <input type="text" id="hide" /> <br /><br />
              <input type="submit" value="Submit" name="submit" />
              <br /><br />
              <input type="text" id="hide" />
            </td>
          </tr>
        </table>

      </form>
    </div>

</body>
</html>
