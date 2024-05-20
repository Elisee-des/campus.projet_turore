from PySide6.QtWidgets import QApplication
import sys
from analyse import MyAnalyseApp

app = QApplication(sys.argv)

window = MyAnalyseApp()

window.show()
app.exec()