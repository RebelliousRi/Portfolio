Program BodyMassIndex;

{This program inputs the height and weight of an individual, calculates and outputs their BMI as well as a message about their health}
{Created by : Arianna St.John}
{Date : 01/02/2022}

Var
    Height, Weight, BMI : Real;
Begin
    Write ('Enter the height in inches and weight in pounds of an individual: ');
    Readln (Height, Weight);
    BMI := ((Weight / Height) / Height) * 703;
    Writeln ('Your BMI is: ', BMI : 0 : 2);
    If BMI < 18.5 
    Then
        Writeln ('You are underweight')
    Else
    If (BMI >= 18.6) and (BMI <= 24.9) 
    Then
        Writeln ('Your weight is normal')
    Else
    If (BMI >= 25) and (BMI <= 29.9) 
    Then
        Writeln ('You are overweight')
    Else
    If BMI > 30 
    Then
        Writeln ('Your health is at risk, you are in the obese category');
End.