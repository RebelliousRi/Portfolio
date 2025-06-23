Program CarRental;

{This program prompts the user to input the car number which is terminated by 0 and the amount of days it was rented for, it calculates and prints the total amount earned by the car firm}
{Created by : Arianna St.John}
{Date : 10/22/2022}

Var
    Number, Days : Integer;
    Discount, Revenue, TotRevenue : Real;
Begin 
    TotRevenue := 0;
    Write ('Enter the car number: ');
    Readln (Number);    
    Write ('Enter the number of days a car was rented for: ');
    Readln (Days);
    While Number <> 0 
    Do
    Begin 
        If Days >= 7 
        Then
        Begin
            Revenue := Days * 250 * 0.25;
        End
        Else
        Begin
            Revenue := Days * 250;
        End;
        TotRevenue := TotRevenue + Revenue;
         Write ('Enter the car number: ');
        Readln (Number);       
        Write ('Enter the number of days a car was rented for: ');
        Readln (Days);
    End;
    Writeln ('The total revenues earned is: ', TotRevenue:0:2);
End.
