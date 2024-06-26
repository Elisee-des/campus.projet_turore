# -*- coding: utf-8 -*-

################################################################################
## Form generated from reading UI file 'analyseImage.ui'
##
## Created by: Qt User Interface Compiler version 6.7.0
##
## WARNING! All changes made in this file will be lost when recompiling UI file!
################################################################################

from PySide6.QtCore import (QCoreApplication, QDate, QDateTime, QLocale,
    QMetaObject, QObject, QPoint, QRect,
    QSize, QTime, QUrl, Qt)
from PySide6.QtGui import (QBrush, QColor, QConicalGradient, QCursor,
    QFont, QFontDatabase, QGradient, QIcon,
    QImage, QKeySequence, QLinearGradient, QPainter,
    QPalette, QPixmap, QRadialGradient, QTransform)
from PySide6.QtWidgets import (QApplication, QGridLayout, QHBoxLayout, QLabel,
    QLineEdit, QMainWindow, QPushButton, QSizePolicy,
    QSpacerItem, QStackedWidget, QVBoxLayout, QWidget)
import resources_rc

class Ui_MainWindow(object):
    def setupUi(self, MainWindow):
        if not MainWindow.objectName():
            MainWindow.setObjectName(u"MainWindow")
        MainWindow.resize(1101, 586)
        self.centralwidget = QWidget(MainWindow)
        self.centralwidget.setObjectName(u"centralwidget")
        self.gridLayout = QGridLayout(self.centralwidget)
        self.gridLayout.setObjectName(u"gridLayout")
        self.gridLayout.setContentsMargins(0, 0, 0, 0)
        self.widget = QWidget(self.centralwidget)
        self.widget.setObjectName(u"widget")
        self.widget.setStyleSheet(u"background-color: rgb(31, 149, 239);")
        self.verticalLayout_3 = QVBoxLayout(self.widget)
        self.verticalLayout_3.setObjectName(u"verticalLayout_3")
        self.horizontalLayout_4 = QHBoxLayout()
        self.horizontalLayout_4.setObjectName(u"horizontalLayout_4")
        self.label = QLabel(self.widget)
        self.label.setObjectName(u"label")
        self.label.setMinimumSize(QSize(40, 40))
        self.label.setMaximumSize(QSize(40, 40))
        self.label.setPixmap(QPixmap(u":/images/profile_pic.png"))
        self.label.setScaledContents(True)

        self.horizontalLayout_4.addWidget(self.label)


        self.verticalLayout_3.addLayout(self.horizontalLayout_4)

        self.verticalLayout = QVBoxLayout()
        self.verticalLayout.setSpacing(15)
        self.verticalLayout.setObjectName(u"verticalLayout")
        self.dashbord_1 = QPushButton(self.widget)
        self.dashbord_1.setObjectName(u"dashbord_1")
        self.dashbord_1.setStyleSheet(u"QPushButton {\n"
"color:white;\n"
"height:30px;\n"
"border:none;\n"
"border-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        icon = QIcon()
        icon.addFile(u":/images/dashboard_white.png", QSize(), QIcon.Normal, QIcon.Off)
        icon.addFile(u":/images/dashboard.png", QSize(), QIcon.Normal, QIcon.On)
        self.dashbord_1.setIcon(icon)
        self.dashbord_1.setCheckable(True)
        self.dashbord_1.setAutoExclusive(True)

        self.verticalLayout.addWidget(self.dashbord_1)

        self.message_1 = QPushButton(self.widget)
        self.message_1.setObjectName(u"message_1")
        self.message_1.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"height:30px;\n"
"border:none;\n"
"border-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        icon1 = QIcon()
        icon1.addFile(u":/images/profile_white.png", QSize(), QIcon.Normal, QIcon.Off)
        icon1.addFile(u":/images/profile.png", QSize(), QIcon.Normal, QIcon.On)
        self.message_1.setIcon(icon1)
        self.message_1.setCheckable(True)
        self.message_1.setAutoExclusive(True)

        self.verticalLayout.addWidget(self.message_1)

        self.message_3 = QPushButton(self.widget)
        self.message_3.setObjectName(u"message_3")
        self.message_3.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"height:30px;\n"
"border:none;\n"
"border-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        icon2 = QIcon()
        icon2.addFile(u":/images/messages_white.png", QSize(), QIcon.Normal, QIcon.Off)
        icon2.addFile(u":/images/messages.png", QSize(), QIcon.Normal, QIcon.On)
        self.message_3.setIcon(icon2)
        self.message_3.setCheckable(True)
        self.message_3.setAutoExclusive(True)

        self.verticalLayout.addWidget(self.message_3)

        self.notification_1 = QPushButton(self.widget)
        self.notification_1.setObjectName(u"notification_1")
        self.notification_1.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"height:30px;\n"
"border:none;\n"
"border-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        icon3 = QIcon()
        icon3.addFile(u":/images/notifications_white.png", QSize(), QIcon.Normal, QIcon.Off)
        icon3.addFile(u":/images/notifications.png", QSize(), QIcon.Normal, QIcon.On)
        self.notification_1.setIcon(icon3)
        self.notification_1.setCheckable(True)
        self.notification_1.setAutoExclusive(True)

        self.verticalLayout.addWidget(self.notification_1)

        self.settings_1 = QPushButton(self.widget)
        self.settings_1.setObjectName(u"settings_1")
        self.settings_1.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"height:30px;\n"
"border:none;\n"
"border-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        icon4 = QIcon()
        icon4.addFile(u":/images/settings_white.png", QSize(), QIcon.Normal, QIcon.Off)
        icon4.addFile(u":/images/settings.png", QSize(), QIcon.Normal, QIcon.On)
        self.settings_1.setIcon(icon4)
        self.settings_1.setCheckable(True)
        self.settings_1.setAutoExclusive(True)

        self.verticalLayout.addWidget(self.settings_1)


        self.verticalLayout_3.addLayout(self.verticalLayout)

        self.verticalSpacer = QSpacerItem(20, 224, QSizePolicy.Policy.Minimum, QSizePolicy.Policy.Expanding)

        self.verticalLayout_3.addItem(self.verticalSpacer)

        self.pushButton_6 = QPushButton(self.widget)
        self.pushButton_6.setObjectName(u"pushButton_6")
        self.pushButton_6.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"height:30px;\n"
"border:none;\n"
"}")
        icon5 = QIcon()
        icon5.addFile(u":/images/log_out_white.png", QSize(), QIcon.Normal, QIcon.Off)
        self.pushButton_6.setIcon(icon5)
        self.pushButton_6.setCheckable(True)
        self.pushButton_6.setAutoExclusive(False)

        self.verticalLayout_3.addWidget(self.pushButton_6)


        self.gridLayout.addWidget(self.widget, 0, 0, 1, 1)

        self.widget_2 = QWidget(self.centralwidget)
        self.widget_2.setObjectName(u"widget_2")
        self.widget_2.setStyleSheet(u"background-color: rgb(31, 149, 239);\n"
"\n"
"QPushButton {\n"
"color:white;\n"
"text-align:left;\n"
"height:30px;\n"
"border:none;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        self.verticalLayout_4 = QVBoxLayout(self.widget_2)
        self.verticalLayout_4.setObjectName(u"verticalLayout_4")
        self.verticalLayout_4.setContentsMargins(-1, -1, 20, -1)
        self.horizontalLayout_3 = QHBoxLayout()
        self.horizontalLayout_3.setObjectName(u"horizontalLayout_3")
        self.horizontalLayout_3.setContentsMargins(-1, -1, 20, -1)
        self.label_4 = QLabel(self.widget_2)
        self.label_4.setObjectName(u"label_4")
        self.label_4.setMinimumSize(QSize(40, 40))
        self.label_4.setMaximumSize(QSize(40, 40))
        self.label_4.setPixmap(QPixmap(u":/images/profile_pic.png"))
        self.label_4.setScaledContents(True)

        self.horizontalLayout_3.addWidget(self.label_4)

        self.label_3 = QLabel(self.widget_2)
        self.label_3.setObjectName(u"label_3")
        font = QFont()
        font.setBold(True)
        self.label_3.setFont(font)
        self.label_3.setStyleSheet(u"color: rgb(255, 255, 255);")

        self.horizontalLayout_3.addWidget(self.label_3)


        self.verticalLayout_4.addLayout(self.horizontalLayout_3)

        self.verticalLayout_2 = QVBoxLayout()
        self.verticalLayout_2.setSpacing(15)
        self.verticalLayout_2.setObjectName(u"verticalLayout_2")
        self.dashbord_2 = QPushButton(self.widget_2)
        self.dashbord_2.setObjectName(u"dashbord_2")
        self.dashbord_2.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"	text-align:left;\n"
"	height:30px;\n"
"border:none;\n"
"padding-left:10px;\n"
"border-top-left-radius:10px;\n"
"border-bottom-left-radius:10px;\n"
"border-top-right-radius:10px;\n"
"border-bottom-right-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        self.dashbord_2.setIcon(icon)
        self.dashbord_2.setCheckable(True)
        self.dashbord_2.setAutoExclusive(True)

        self.verticalLayout_2.addWidget(self.dashbord_2)

        self.message_2 = QPushButton(self.widget_2)
        self.message_2.setObjectName(u"message_2")
        self.message_2.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"	text-align:left;\n"
"	height:30px;\n"
"border:none;\n"
"padding-left:10px;\n"
"border-top-left-radius:10px;\n"
"border-bottom-left-radius:10px;\n"
"border-top-right-radius:10px;\n"
"border-bottom-right-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        self.message_2.setIcon(icon1)
        self.message_2.setCheckable(True)
        self.message_2.setAutoExclusive(True)

        self.verticalLayout_2.addWidget(self.message_2)

        self.message_4 = QPushButton(self.widget_2)
        self.message_4.setObjectName(u"message_4")
        self.message_4.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"	text-align:left;\n"
"	height:30px;\n"
"border:none;\n"
"padding-left:10px;\n"
"border-top-left-radius:10px;\n"
"border-bottom-left-radius:10px;\n"
"border-top-right-radius:10px;\n"
"border-bottom-right-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        self.message_4.setIcon(icon2)
        self.message_4.setCheckable(True)
        self.message_4.setAutoExclusive(True)

        self.verticalLayout_2.addWidget(self.message_4)

        self.notification_2 = QPushButton(self.widget_2)
        self.notification_2.setObjectName(u"notification_2")
        self.notification_2.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"	text-align:left;\n"
"	height:30px;\n"
"border:none;\n"
"padding-left:10px;\n"
"border-top-left-radius:10px;\n"
"border-bottom-left-radius:10px;\n"
"border-top-right-radius:10px;\n"
"border-bottom-right-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        self.notification_2.setIcon(icon3)
        self.notification_2.setCheckable(True)
        self.notification_2.setAutoExclusive(True)

        self.verticalLayout_2.addWidget(self.notification_2)

        self.settings_2 = QPushButton(self.widget_2)
        self.settings_2.setObjectName(u"settings_2")
        self.settings_2.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"	text-align:left;\n"
"	height:30px;\n"
"border:none;\n"
"padding-left:10px;\n"
"border-top-left-radius:10px;\n"
"border-bottom-left-radius:10px;\n"
"border-top-right-radius:10px;\n"
"border-bottom-right-radius:10px;\n"
"}\n"
"\n"
"QPushButton:checked {\n"
"background-color:#F5FAFE;\n"
"color:#1F95EF;\n"
"font-weight:bold;\n"
"}")
        self.settings_2.setIcon(icon4)
        self.settings_2.setCheckable(True)
        self.settings_2.setAutoExclusive(True)

        self.verticalLayout_2.addWidget(self.settings_2)


        self.verticalLayout_4.addLayout(self.verticalLayout_2)

        self.verticalSpacer_2 = QSpacerItem(20, 224, QSizePolicy.Policy.Minimum, QSizePolicy.Policy.Expanding)

        self.verticalLayout_4.addItem(self.verticalSpacer_2)

        self.pushButton_7 = QPushButton(self.widget_2)
        self.pushButton_7.setObjectName(u"pushButton_7")
        self.pushButton_7.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"	text-align:left;\n"
"	height:30px;\n"
"border:none;\n"
"padding-left:10px\n"
"}")
        self.pushButton_7.setIcon(icon5)
        self.pushButton_7.setCheckable(True)
        self.pushButton_7.setAutoExclusive(False)

        self.verticalLayout_4.addWidget(self.pushButton_7)


        self.gridLayout.addWidget(self.widget_2, 0, 1, 1, 1)

        self.widget_3 = QWidget(self.centralwidget)
        self.widget_3.setObjectName(u"widget_3")
        self.widget_3.setStyleSheet(u"background-color: rgb(245, 240, 254);")
        self.verticalLayout_5 = QVBoxLayout(self.widget_3)
        self.verticalLayout_5.setObjectName(u"verticalLayout_5")
        self.header_widget = QWidget(self.widget_3)
        self.header_widget.setObjectName(u"header_widget")
        self.horizontalLayout_5 = QHBoxLayout(self.header_widget)
        self.horizontalLayout_5.setObjectName(u"horizontalLayout_5")
        self.pushButton_13 = QPushButton(self.header_widget)
        self.pushButton_13.setObjectName(u"pushButton_13")
        self.pushButton_13.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"	border:none;\n"
"}")
        icon6 = QIcon()
        icon6.addFile(u":/images/menu.png", QSize(), QIcon.Normal, QIcon.Off)
        self.pushButton_13.setIcon(icon6)
        self.pushButton_13.setCheckable(True)

        self.horizontalLayout_5.addWidget(self.pushButton_13)

        self.horizontalLayout_2 = QHBoxLayout()
        self.horizontalLayout_2.setObjectName(u"horizontalLayout_2")
        self.lineEdit = QLineEdit(self.header_widget)
        self.lineEdit.setObjectName(u"lineEdit")

        self.horizontalLayout_2.addWidget(self.lineEdit)

        self.pushButton_14 = QPushButton(self.header_widget)
        self.pushButton_14.setObjectName(u"pushButton_14")
        self.pushButton_14.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"	border:none;\n"
"}")
        icon7 = QIcon()
        icon7.addFile(u":/images/search.png", QSize(), QIcon.Normal, QIcon.Off)
        self.pushButton_14.setIcon(icon7)

        self.horizontalLayout_2.addWidget(self.pushButton_14)


        self.horizontalLayout_5.addLayout(self.horizontalLayout_2)

        self.pushButton_15 = QPushButton(self.header_widget)
        self.pushButton_15.setObjectName(u"pushButton_15")
        self.pushButton_15.setStyleSheet(u"QPushButton {\n"
"	color:white;\n"
"	border:none;\n"
"}")
        icon8 = QIcon()
        icon8.addFile(u":/images/image.png", QSize(), QIcon.Normal, QIcon.Off)
        self.pushButton_15.setIcon(icon8)

        self.horizontalLayout_5.addWidget(self.pushButton_15)


        self.verticalLayout_5.addWidget(self.header_widget)

        self.stackedWidget = QStackedWidget(self.widget_3)
        self.stackedWidget.setObjectName(u"stackedWidget")
        self.dashbord_page = QWidget()
        self.dashbord_page.setObjectName(u"dashbord_page")
        self.label_2 = QLabel(self.dashbord_page)
        self.label_2.setObjectName(u"label_2")
        self.label_2.setGeometry(QRect(320, 210, 231, 41))
        font1 = QFont()
        font1.setPointSize(20)
        self.label_2.setFont(font1)
        self.stackedWidget.addWidget(self.dashbord_page)
        self.profile_page = QWidget()
        self.profile_page.setObjectName(u"profile_page")
        self.label_5 = QLabel(self.profile_page)
        self.label_5.setObjectName(u"label_5")
        self.label_5.setGeometry(QRect(330, 220, 231, 41))
        self.label_5.setFont(font1)
        self.stackedWidget.addWidget(self.profile_page)
        self.message_page = QWidget()
        self.message_page.setObjectName(u"message_page")
        self.label_6 = QLabel(self.message_page)
        self.label_6.setObjectName(u"label_6")
        self.label_6.setGeometry(QRect(340, 220, 231, 41))
        self.label_6.setFont(font1)
        self.stackedWidget.addWidget(self.message_page)
        self.notification_page = QWidget()
        self.notification_page.setObjectName(u"notification_page")
        self.label_7 = QLabel(self.notification_page)
        self.label_7.setObjectName(u"label_7")
        self.label_7.setGeometry(QRect(320, 200, 231, 41))
        self.label_7.setFont(font1)
        self.stackedWidget.addWidget(self.notification_page)
        self.settings_page = QWidget()
        self.settings_page.setObjectName(u"settings_page")
        self.label_8 = QLabel(self.settings_page)
        self.label_8.setObjectName(u"label_8")
        self.label_8.setGeometry(QRect(320, 210, 231, 41))
        self.label_8.setFont(font1)
        self.stackedWidget.addWidget(self.settings_page)

        self.verticalLayout_5.addWidget(self.stackedWidget)


        self.gridLayout.addWidget(self.widget_3, 0, 2, 1, 1)

        MainWindow.setCentralWidget(self.centralwidget)

        self.retranslateUi(MainWindow)
        self.pushButton_13.toggled.connect(self.widget.setHidden)
        self.pushButton_13.toggled.connect(self.widget_2.setVisible)
        self.settings_1.toggled.connect(self.settings_2.setChecked)
        self.notification_1.toggled.connect(self.notification_2.setChecked)
        self.message_3.toggled.connect(self.message_4.setChecked)
        self.message_1.toggled.connect(self.message_2.setChecked)
        self.dashbord_1.toggled.connect(self.dashbord_2.setChecked)
        self.dashbord_2.toggled.connect(self.dashbord_1.setChecked)
        self.message_2.toggled.connect(self.message_1.setChecked)
        self.message_4.toggled.connect(self.message_3.setChecked)
        self.notification_2.toggled.connect(self.notification_1.setChecked)
        self.settings_2.toggled.connect(self.settings_1.setChecked)
        self.pushButton_6.toggled.connect(MainWindow.close)
        self.pushButton_7.toggled.connect(MainWindow.close)

        QMetaObject.connectSlotsByName(MainWindow)
    # setupUi

    def retranslateUi(self, MainWindow):
        MainWindow.setWindowTitle(QCoreApplication.translate("MainWindow", u"MainWindow", None))
        self.label.setText("")
        self.dashbord_1.setText("")
        self.message_1.setText("")
        self.message_3.setText("")
        self.notification_1.setText("")
        self.settings_1.setText("")
        self.pushButton_6.setText("")
        self.label_4.setText("")
        self.label_3.setText(QCoreApplication.translate("MainWindow", u"Analyse", None))
        self.dashbord_2.setText(QCoreApplication.translate("MainWindow", u"Dashbord", None))
        self.message_2.setText(QCoreApplication.translate("MainWindow", u"Profile", None))
        self.message_4.setText(QCoreApplication.translate("MainWindow", u"Message", None))
        self.notification_2.setText(QCoreApplication.translate("MainWindow", u"Notification", None))
        self.settings_2.setText(QCoreApplication.translate("MainWindow", u"Settings", None))
        self.pushButton_7.setText(QCoreApplication.translate("MainWindow", u"Sign Out", None))
        self.pushButton_13.setText("")
        self.pushButton_14.setText("")
        self.pushButton_15.setText("")
        self.label_2.setText(QCoreApplication.translate("MainWindow", u"Dashbord page", None))
        self.label_5.setText(QCoreApplication.translate("MainWindow", u"Profile page", None))
        self.label_6.setText(QCoreApplication.translate("MainWindow", u"Message page", None))
        self.label_7.setText(QCoreApplication.translate("MainWindow", u"Notification page", None))
        self.label_8.setText(QCoreApplication.translate("MainWindow", u"Settings page", None))
    # retranslateUi

