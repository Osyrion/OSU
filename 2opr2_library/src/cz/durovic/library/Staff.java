package cz.durovic.library;

public class Staff extends Account {
    private double salary;

    // constructor
    public Staff(int id, String nameSurname, String phoneNumber, String email, double salary) {
        super(id, nameSurname, phoneNumber, email);
        this.salary = salary;
    }

    @Override
    public void printInfo() {}

    // getter
    public double getSalary() {
        return salary;
    }

    // setter
    public void setSalary(double salary) {
        this.salary = salary;
    }
}
