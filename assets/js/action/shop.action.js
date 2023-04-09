// pet scout 
function petScout(userID) {
    $.ajax({
        url: "../back/action/shop.action.php?action=petScout",
        type: "GET",
        data: {
            userID: userID
        },
        success: function() {
            showPetScout();
        }
    });
    
    refreshShop();
}

function purchaseFood(userID, foodID, foodPrice) {
    $.ajax({
        url: "../back/action/shop.action.php?action=purchaseFood",
        type: "GET",
        data: {
            userID: userID,
            foodID: foodID,
            foodPrice: foodPrice
        },
        success: function() {
            refreshFoodShop();
        }
    });
    
    refreshShop();
}