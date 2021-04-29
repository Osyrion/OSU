package com.durovic;

public class Main {

    public static void main(String[] args) {
        CardShaker cardShaker = new CardShaker();

        System.out.println("All 32 cards:");
        cardShaker.generateAllCards();
        cardShaker.printAllCards();

        System.out.println("\nThe cards have been shuffled...");
        cardShaker.shakeAllCards();
        cardShaker.printAllCards();

        System.out.println("\nAll cards with color 'Red':");
        cardShaker.printCards(cardShaker.getCardsWithColor("Red"));

        System.out.println("\nAll cards with rank 'A':");
        cardShaker.printCards(cardShaker.getCardsWithRank("A"));

        System.out.println("\nAll cards with shape 'Hearts':");
        cardShaker.printCards(cardShaker.getCardsWithShape("Hearts"));

        System.out.println("\nRandom 5 cards:");
        cardShaker.printCards(cardShaker.getRandomCards(5));
    }
}
