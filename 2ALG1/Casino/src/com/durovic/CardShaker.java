package com.durovic;

import java.util.Random;

public class CardShaker {
    private Card[] cards;

    public CardShaker() {
        cards = new Card[32];
    }

    public void generateAllCards() {
        cards[0] = new Card("Red", "7", "Hearts");
        cards[1] = new Card("Red", "8", "Hearts");
        cards[2] = new Card("Red", "9", "Hearts");
        cards[3] = new Card("Red", "10", "Hearts");
        cards[4] = new Card("Red", "J", "Hearts");
        cards[5] = new Card("Red", "Q", "Hearts");
        cards[6] = new Card("Red", "K", "Hearts");
        cards[7] = new Card("Red", "A", "Hearts");

        cards[8] = new Card("Red", "7", "Diamonds");
        cards[9] = new Card("Red", "8", "Diamonds");
        cards[10] = new Card("Red", "9", "Diamonds");
        cards[11] = new Card("Red", "10", "Diamonds");
        cards[12] = new Card("Red", "J", "Diamonds");
        cards[13] = new Card("Red", "Q", "Diamonds");
        cards[14] = new Card("Red", "K", "Diamonds");
        cards[15] = new Card("Red", "A", "Diamonds");

        cards[16] = new Card("Black", "7", "Pikes");
        cards[17] = new Card("Black", "8", "Pikes");
        cards[18] = new Card("Black", "9", "Pikes");
        cards[19] = new Card("Black", "10", "Pikes");
        cards[20] = new Card("Black", "J", "Pikes");
        cards[21] = new Card("Black", "Q", "Pikes");
        cards[22] = new Card("Black", "K", "Pikes");
        cards[23] = new Card("Black", "A", "Pikes");

        cards[24] = new Card("Black", "7", "Clovers");
        cards[25] = new Card("Black", "8", "Clovers");
        cards[26] = new Card("Black", "9", "Clovers");
        cards[27] = new Card("Black", "10", "Clovers");
        cards[28] = new Card("Black", "J", "Clovers");
        cards[29] = new Card("Black", "Q", "Clovers");
        cards[30] = new Card("Black", "K", "Clovers");
        cards[31] = new Card("Black", "A", "Clovers");
    }

    public void shakeAllCards() {
        Random rand = new Random();
        int y = 0;
        for (Card c : cards) {
            int x = rand.nextInt(cards.length);

            Card tmpCard = cards[y];
            cards[y] = cards[x];
            cards[x] = tmpCard;

            y++;
        }
    }

    public void printAllCards() {
        for (Card c : cards) {
            System.out.println(c.getInfo());
        }
    }

    public Card[] getCardsWithColor(String requiredColor) {
        Card[] tmpCards = new Card[16];
        int x = 0;
        for (Card c : cards) {
            if (c.getColor().equals(requiredColor)) {
                tmpCards[x] = c;
                x++;
            }
        }
        return tmpCards;
    }

    public Card[] getCardsWithRank(String requiredRank) {
        Card[] tmpCards = new Card[4];
        int x = 0;
        for (Card c : cards) {
            if (c.getRank().equals(requiredRank)) {
                tmpCards[x] = c;
                x++;
            }
        }
        return tmpCards;
    }

    public Card[] getCardsWithShape(String requiredShape) {
        Card[] tmpCards = new Card[8];
        int x = 0;
        for (Card c : cards) {
            if (c.getShape().equals(requiredShape)) {
                tmpCards[x] = c;
                x++;
            }
        }
        return tmpCards;
    }

    public Card[] getRandomCards(int count) {
        Random rand = new Random();
        Card[] tmpCards = new Card[count];
        int x = 0;
        for (Card c : cards) {
            if (x < count) {
                tmpCards[x] = cards[rand.nextInt(cards.length)];
                x++;
            }
        }
        return tmpCards;
    }

    public void printCards(Card[] cardsToPrint) {
        for (Card c : cardsToPrint) {
            System.out.println(c.getInfo());
        }
    }
}
