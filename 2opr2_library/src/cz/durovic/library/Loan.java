package cz.durovic.library;

import java.util.*;
import java.util.concurrent.Delayed;

public class Loan {
    private User user;
    private Book book;
    private Staff staff;
    private Date borrowedDate;
    private Date dateReturned;
    private boolean isFined;
    private ArrayList<Loan> finedLoans;
    private ArrayList<Delayed> delayedLoans;
    static int loanPeriod = 31;


    // constructor
    public Loan(User user, Book book, Staff staff, Date borrowedDate, Date dateReturned, boolean isFined) {

    }

    public Date getDate() {
        Date actualDate = null;

        // set actual date

        return actualDate;
    }

    // add to array a loan that have to be fined
    public void addFine() {}

    // add to array a loan that is actually in delay but still not returned
    public void addDelayedLoans() {}

    // if book is returned after deadline then it will be fined
    public boolean isLoanFined(Date dateReturned) {
        return isFined;
    }

    // notify when loan is delayed
    public String notifyDelay() {
        return "Message about delayed loan.";
    }

    // prolong book for another 31 days
    public void prolongBook() {
    }

    // calculate fine after books have been returned
    public double calculateFine() {
        double totalFine = 0;

        // calculation

        return totalFine;
    }

    /** GETTERS */
    public Book getBook() {
        return book;
    }

    public Staff getStaff() {
        return staff;
    }

    public User getUser() {
        return user;
    }

    public Date getBorrowedDate() {
        return borrowedDate;
    }

    public Date getDateReturned() {
        return dateReturned;
    }

    public boolean getFineStatus() {
        return isFined;
    }

    public ArrayList<Loan> getFinedLoans() { return finedLoans; }

    // get fined loans from current user
    public ArrayList<Loan> getFinedLoans(User user) { return finedLoans; }

    public ArrayList<Delayed> getDelayedLoans() { return delayedLoans; }

    // get delayed loans from current user
    public ArrayList<Delayed> getDelayedLoans(User user) { return delayedLoans; }

    /** SETTERS */
    public void setBorrowedDate(Date borrowedDate) {
        this.borrowedDate = borrowedDate;
    }

    public void setDateReturned(Date dateReturned) {
        this.dateReturned = dateReturned;
    }

    public void setFined(boolean fined) {
        isFined = fined;
    }
}
