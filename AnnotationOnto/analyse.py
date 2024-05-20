from ui_analyseImage import Ui_MainWindow
from PySide6.QtWidgets import QApplication, QMainWindow, QPushButton


class MyAnalyseApp(QMainWindow, Ui_MainWindow):
    def __init__(self):
        super().__init__(self)
        self.setupUi(self)
        self.setWindowTitle('Analyseur Menu')
        
        self.icon_name_widget.setHidden(True)
        
        self.dashboad_1.clicked.connect(self.switch_to_dashboardPage)
        self.dashboad_2.clicked.connect(self.switch_to_dashboardPage)
        
        self.profile_1.clicked.connect(self.switch_to_profilePage)
        self.profile_2.clicked.connect(self.switch_to_profilePage)
        
        self.message_1.clicked.connect(self.switch_to_messagePage)
        self.message_2.clicked.connect(self.switch_to_messagePage)
        
        self.notification_1.clicked.connect(self.switch_to_notificationPage)
        self.notification_2.clicked.connect(self.switch_to_notificationPage)
        
        self.settings_1.clicked.connect(self.switch_to_settingsPage)
        self.settings_2.clicked.connect(self.switch_to_settingsPage)
    
    def switch_to_dashboardPage(self):
        self.stackedWidget.setCurrentIndex(0)
        
    def switch_to_profilePage(self):
        self.stackedWidget.setCurrentIndex(1)
        
    def switch_to_messagePage(self):
        self.stackedWidget.setCurrentIndex(2)
        
    def switch_to_notificationPage(self):
        self.stackedWidget.setCurrentIndex(3)
        
    def switch_to_settingsPage(self):
        self.stackedWidget.setCurrentIndex(4)
        
    