#include <iostream>
using namespace std;

int main()
{
	cout << "Enter number of subjects: ";
	int t, c = 1;
	float sum1 = 0, sum2 = 0;
	cin >> t;
	while (t--) {
		cout << "\nSubject " << c++ << " :\n";
		int n;
		cout << "Enter credit hours: ";
		cin >> n;
		sum2 += n;
		string s;
		bool check;
		do {
			check = true;
			cout << "Enter letter grade: ";
			cin >> s;
			if (s == "A+")
				sum1 += 4 * n;
			else if (s == "A")
				sum1 += 3.6 * n;
			else if (s == "B+")
				sum1 += 3.3 * n;
			else if (s == "B")
				sum1 += 3 * n;
			else if (s == "C+")
				sum1 += 2.6 * n;
			else if (s == "C")
				sum1 += 2.4 * n;
			else if (s == "D+")
				sum1 += 2.2 * n;
			else if (s == "D")
				sum1 += 2 * n;
			else if (s == "F")
				sum1 += 0 * n;
			else {
				check = false;
				cerr << "Invalid input, Try Enter (A+ - A - B+ - B - C+ - C - D+ - D - F)\n";
			}
		} while (!check);
	}
	cout << "\nThe result is the cumulative G.P.A. : " << sum1 / sum2 << endl;
}