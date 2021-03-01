package cz.durovic.library;

public class Account {
    private int accountID;
    private String nameSurname;
    private String phoneNumber;
    private String email;

    // constructor
    public Account(int accountID, String nameSurname, String phoneNumber, String email) {
        this.accountID = accountID;
        this.nameSurname = nameSurname;
        this.phoneNumber = phoneNumber;
        this.email = email;
    }

    public void printInfo() {}

    private int generateID() {
        // generating unique ID number
        return accountID;
    }

    /** GETTERS */
    public int getAccountID() {
        return accountID;
    }

    public String getNameSurname() {
        return nameSurname;
    }

    public String getPhoneNumber() {
        return phoneNumber;
    }

    public String getEmail() {
        return email;
    }

    /** SETTERS */
    public void setNameSurname(String nameSurname) {
        this.nameSurname = nameSurname;
    }

    public void setPhoneNumber(String phoneNumber) {
        this.phoneNumber = phoneNumber;
    }

    public void setEmail(String email) {
        this.email = email;
    }
}
