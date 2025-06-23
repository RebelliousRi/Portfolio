Program HotDay;

{This program prompts the user to input the maximum and minimum temperatures of a day, calculates the dIfference and If the maximum temperature is greater than 30 it outputs a message}
{Created by : Arianna St.John}
{Date : 13/01/2022}

Var
    Max, Min, DIff : Real;
Begin
    Write ('Enter the maximum and minimum temperature for a day: ');
    Readln (Max, Min);
    DIff := Max - Min;
    If Max > 30 
    Then
        Writeln ('It was a hot day');
    Writeln ('The dIfference between the maximum and minimum temperature is: ', DIff : 0 : 2);
End.