// decrease food by one
function decreaseFood_one(userID, foodID) {

    $.ajax({
        url: "../back/action/dashboard.action.php?action=decreaseFood_one",
        type: "GET",
        data: {
            userID: userID,
            foodID: foodID
        }
    });
    refreshDashboard();
    showFeedToast();
}

// equip pet
function equipPet(userID, petID) {

    $.ajax({
        url: "../back/action/dashboard.action.php?action=equipPet",
        type: "GET",
        data: {
            userID: userID,
            petID: petID
        }
    });
    refreshDashboard();
    showEquippedToast();
}

// equip wallpaper
function equipWallpaper(userID, wallpaperID) {
    $.ajax({
        url: "../back/action/dashboard.action.php?action=equipWallpaper",
        type: "GET",
        data: {
            userID: userID,
            wallpaperID: wallpaperID
        }
    });
    refreshDashboard();
    showEquippedToast();
}

function updateTask(taskID){    
    let taskTitle = document.getElementById('editTaskTitle' + taskID).value;
    let taskDesc = document.getElementById('editTaskDesc' + taskID).value;
    let taskDue = document.getElementById('editTaskDue' + taskID).value;

    $.ajax({
        url: "../back/action/dashboard.action.php?action=updateTask",
        type: "GET",
        data: {
            taskID: taskID,
            taskTitle: taskTitle,
            taskDesc: taskDesc,
            taskDue: taskDue
        }
    });
    refreshDashboard();
}

function addTask() {
    var taskInput = document.getElementById("taskTitle");
    var taskTitle = taskInput.value.trim();

    if (taskTitle !== '') {
        $.ajax({
            url: "../back/action/dashboard.action.php?action=addTask",
            type: "POST",
            data: {
                taskTitle: taskTitle
            },
            success: function(){
                refreshDashboard();
                taskInput.value = '';
            }
        });
    }
}

function deleteTask(taskID){    
    $.ajax({
        url: "../back/action/dashboard.action.php?action=deleteTask",
        type: "GET",
        data: {
            taskID: taskID,
        }
    });
    refreshDashboard();
}

function updateTaskStatus(taskID, taskStatus) {
    $.ajax({
        url: '../back/action/dashboard.action.php?action=updateTaskStatus',
        type: 'GET',
        data: {
            taskID: taskID,
            taskStatus: taskStatus
        },
        success: function() {
            refreshDashboard();
            showTaskToast();
        }
    });
}

function deleteCompletedTasks(userID) {    
    $.ajax({
        url: "../back/action/dashboard.action.php?action=deleteCompletedTasks",
        type: "GET",
        data: {
            userID: userID,
        },

        success: function() {
            refreshTask('Completed');
        }
    });
    document.getElementById('toast-delete').play();
}

function addHabit() {
    var habitInput = document.getElementById("habitTitle");
    var habitTitle = habitInput.value.trim();

    if (habitTitle !== '') {
        $.ajax({
            url: "../back/action/dashboard.action.php?action=addHabit",
            type: "POST",
            data: {
                habitTitle: habitTitle
            },
            success: function(){
                refreshDashboard();
                habitInput.value = '';
            }
        });
    }
}

function updateHabit(habitID) {
    let difficultyID = document.getElementById('difficulty' + habitID).value;
    let habitTitle = document.getElementById('editHabitTitle' + habitID).value;
    let habitDesc = document.getElementById('editHabitDesc' + habitID).value;
    let habitPositive = document.getElementById('naturePositive' + habitID).value;
    let habitNegative = document.getElementById('natureNegative' + habitID).value;

    $.ajax({
        url: "../back/action/dashboard.action.php?action=updateHabit",
        type: "GET",
        data: {
            habitID: habitID,
            difficultyID: difficultyID,
            habitTitle: habitTitle,
            habitDesc: habitDesc,
            habitPositive: habitPositive,
            habitNegative: habitNegative,
        }
    });
    refreshDashboard();
}

function deleteHabit(habitID) {
    $.ajax({
        url: "../back/action/dashboard.action.php?action=deleteHabit",
        type: "GET",
        data: {
            habitID: habitID,
        }
    });
    refreshDashboard();
}

function habitReward(difficultyID) {
    $.ajax({
        url: "../back/action/dashboard.action.php?action=habitReward",
        type: "GET",
        data: {
            difficultyID: difficultyID,
        }
    });
    refreshDashboard();
}

function habitPenalize(difficultyID) {
    $.ajax({
        url: "../back/action/dashboard.action.php?action=habitPenalize",
        type: "GET",
        data: {
            difficultyID: difficultyID,
        }
    });
    refreshDashboard();
}