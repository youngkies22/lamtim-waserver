<x-layout-dashboard title="{{ __('Chat') }}">
<style>
.chat-message-wrapper {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}
.app-chat .app-chat-history .chat-history-body .chat-history .chat-message.chat-message-right .chat-message-text a {
  color: #fff;
}
.dropdown-toggle::after {
	content: unset;
}
.chat-message-right .chat-message-wrapper {
	align-items: flex-end;
}
.avatar .avatar-initial {
	border: 1px solid #c9c9c9;
}
.app-chat .app-chat-history .chat-history-body {
	background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjAiIHk9IjAiIHZpZXdCb3g9IjAgMCAyNjAgMjYwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48c3R5bGU+LnN0MHtmaWxsLXJ1bGU6ZXZlbm9kZDtjbGlwLXJ1bGU6ZXZlbm9kZDtmaWxsOiNlMWUwZTl9PC9zdHlsZT48ZyBpZD0iaS1saWtlLWZvb2QiPjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0yNC40IDE2Yy4yLjYuNCAxLjMuNSAyaC0zLjdsMS4yIDIuMy41LjktLjIuMVYyOGMyLjIgMS43IDIuNyA0LjggMSA3LS44IDEtMS45IDEuNy0zLjIgMS45di4xYy0uOSAzLjUtNC4xIDYtNy44IDZoLTIwYy0zLjYgMC02LjgtMi41LTcuNy02di0uMWMtMi43LS40LTQuNi0zLTQuMi01LjcuMi0xLjMuOS0yLjUgMS45LTMuMnYtNi44bC0uOC0xLjYtLjQtLjkuOS0uNC42LS4zaC0zQy0xNy4yIDUuNi00LjktMi4yIDcuNS42IDE1LjQgMi4zIDIxLjkgOC4yIDI0LjQgMTZ6bS0zNi44IDJjLS4yIDAtLjMgMC0uNC4xbC0zLjEgMS42LjkgMS44IDEuMy0uN2MuOC0uNCAxLjgtLjQgMi43IDBsMi4yIDEuMWMuMy4xLjYuMS45IDBsMi4yLTEuMWMuOC0uNCAxLjgtLjQgMi43IDBsMi4yIDEuMWMuMy4xLjYuMS45IDBsMi4yLTEuMWMuOC0uNCAxLjgtLjQgMi43IDBsMi4yIDEuMWMuMi4xLjUuMS44IDBsMi45LTEuM2MuOC0uMyAxLjctLjMgMi40IDBsMi45IDEuM2MuMy4xLjYuMS45IDBsMy4xLTEuNS0uOS0xLjgtMS40LjdjLS44LjQtMS43LjQtMi42LjFsLTIuOC0xLjJjLS4yLS4yLS4zLS4yLS40LS4yLS4xIDAtLjMgMC0uNC4xbC0yLjggMS4yYy0uOC40LTEuOC4zLTIuNi0uMUw0IDE4LjFjLS4xLS4xLS4zLS4xLS40LS4xLS4yIDAtLjMgMC0uNC4xTDEgMTkuMmMtLjguNC0xLjguNC0yLjcgMEwtNCAxOC4xYy0uMS0uMS0uMy0uMS0uNC0uMS0uMiAwLS4zIDAtLjQuMUwtNyAxOS4yYy0uOC40LTEuOC40LTIuNyAwbC0yLjItMS4xYy0uMi0uMS0uNC0uMS0uNS0uMXptMC0yaC00LjlDLTEzLjUgNS4xLTEuNS0uNyA5LjUgMy4yYzYgMi4xIDEwLjcgNi44IDEyLjggMTIuOGgtMi4xbC0uMS0uMS0uMi4xaC0zMi4zem0zMC4zIDcuN2wxLjQtLjdoMS4zdjJoLTM2di0xLjFsLjMtLjIgMS40LS43aDIuNmwxLjQuN2MuOC40IDEuOC40IDIuNyAwbDEuNC0uN0gtM2wxLjQuN2MuOC40IDEuOC40IDIuNyAwbDEuMi0uN2gyLjZsMS40LjdjLjcuNCAxLjcuNCAyLjUgMGwxLjctLjdoMy4ybDEuNy43Yy44LjQgMS43LjQgMi41IDB6TS0xMy44IDI3bDE2LjQgNC45TDE4LjkgMjdoLTMyLjd6bS0uNiAyaC4zbDE2LjcgNSAxNi43LTVoLjNjMS43IDAgMyAxLjMgMyAzcy0xLjMgMy0zIDNoLTM0Yy0xLjcgMC0zLTEuMy0zLTNzMS4zLTMgMy0zem0xLjMgOGMuOCAyLjQgMy4xIDQgNS43IDRoMjBjMi41IDAgNC44LTEuNiA1LjctNGgtMzEuNHoiLz48cGF0aCBpZD0icGF0aDZfZmlsbC1jb3B5IiBjbGFzcz0ic3QwIiBkPSJNMjg0LjQgMTZjLjIuNi40IDEuMy41IDJoLTMuN2wxLjIgMi4zLjUuOS0uMi4xVjI4YzIuMiAxLjcgMi43IDQuOCAxIDctLjggMS0xLjkgMS43LTMuMiAxLjl2LjFjLS45IDMuNS00LjEgNi03LjggNmgtMjBjLTMuNiAwLTYuOC0yLjUtNy43LTZ2LS4xYy0yLjctLjQtNC42LTMtNC4yLTUuNy4yLTEuMy45LTIuNSAxLjktMy4ydi02LjhsLS44LTEuNi0uNC0uOS45LS40LjYtLjNoLTNDMjQyLjggNS42IDI1NS4xLTIuMiAyNjcuNS42YzcuOSAxLjcgMTQuNCA3LjYgMTYuOSAxNS40em0tMzYuOSAyYy0uMiAwLS4zIDAtLjQuMWwtMy4xIDEuNi45IDEuOCAxLjMtLjdjLjgtLjQgMS44LS40IDIuNyAwbDIuMiAxLjFjLjMuMS42LjEuOSAwbDIuMi0xLjFjLjgtLjQgMS44LS40IDIuNyAwbDIuMiAxLjFjLjMuMS42LjEuOSAwbDIuMi0xLjFjLjgtLjQgMS44LS40IDIuNyAwbDIuMiAxLjFjLjMuMS42LjEuOSAwbDIuOS0xLjNjLjgtLjMgMS43LS4zIDIuNCAwbDIuOSAxLjNjLjMuMS42LjEuOSAwbDMuMS0xLjUtLjktMS44LTEuNC43Yy0uOC40LTEuNy40LTIuNi4xbC0yLjgtMS4yYy0uMS0uMS0uMy0uMS0uNC0uMS0uMSAwLS4zIDAtLjQuMWwtMi44IDEuMmMtLjguNC0xLjguMy0yLjYtLjFsLTIuMy0xLjFjLS4xLS4xLS4zLS4xLS41LS4xcy0uMyAwLS40LjFsLTIuMiAxLjFjLS44LjQtMS44LjQtMi43IDBsLTIuMi0xLjFjLS4xLS4xLS4zLS4xLS40LS4xLS4yIDAtLjMgMC0uNC4xbC0yLjIgMS4xYy0uOC40LTEuOC40LTIuNyAwbC0yLjItMS4xYy0uMi0uMi0uNC0uMi0uNi0uMnptMC0yaC00LjljMy45LTEwLjkgMTUuOS0xNi43IDI2LjgtMTIuOCA2IDIuMSAxMC43IDYuOCAxMi44IDEyLjhoLTIuMWwtLjEtLjEtLjMuMWgtMzIuMnptMzAuNCA3LjdsMS40LS43aDEuM3YyaC0zNnYtMS4xbC4zLS4yIDEuNC0uN2gyLjZsMS40LjdjLjguNCAxLjguNCAyLjcgMGwxLjQtLjdoMi42bDEuNC43Yy44LjQgMS44LjQgMi43IDBsMS40LS43aDIuNmwxLjQuN2MuOC40IDEuNy40IDIuNi4xbDEuNy0uN2gzLjJsMS43LjdjLjUuMyAxLjQuMyAyLjItLjF6TTI0Ni4yIDI3bDE2LjQgNC45TDI3OSAyN2gtMzIuOHptLS43IDJoLjNsMTYuNyA1IDE2LjctNWguM2MxLjcgMCAzIDEuMyAzIDNzLTEuMyAzLTMgM2gtMzRjLTEuNyAwLTMtMS4zLTMtM3MxLjQtMyAzLTN6bTEuNCA4Yy44IDIuNCAzLjEgNCA1LjYgNGgyMGMyLjUgMCA0LjgtMS42IDUuNy00aC0zMS4zeiIvPjxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xNTkuNSAyMWMtMS4zLTMuNi00LjctNi04LjUtNmgtNDJjLTMuOCAwLTcuMiAyLjQtOC41IDYtMy4zLjMtNS44IDMuMi01LjUgNi41LjIgMi45IDIuNiA1LjIgNS41IDUuNS0xLjcgNC43LjggOS44IDUuNCAxMS41IDEgLjMgMiAuNSAzIC41aDQyYzUgMCA5LTQgOS05IDAtMS0uMi0yLjEtLjUtMyAzLjMtLjMgNS44LTMuMiA1LjUtNi41LS4yLTIuOS0yLjUtNS4yLTUuNC01LjV6bS04LjUtNGgtNDJjLTIuNyAwLTUuMiAxLjYtNi4zIDRoNTQuN2MtMS4yLTIuNC0zLjctNC02LjQtNHptLTkuMyAyNmMyLjEtMS43IDMuMy00LjMgMy4zLTdoLTJjMCAzLjktMy4xIDctNyA3aC00LjNjMi4xLTEuNyAzLjMtNC4zIDMuMy03aC0yYzAgMy45LTMuMSA3LTcgN2gtNC4zYzIuMS0xLjcgMy4zLTQuMyAzLjMtN2gtMmMwIDMuOS0zLjEgNy03IDdoLTdjLTMuOSAwLTctMy4xLTctN3MzLjEtNyA3LTdoNDJjMy45IDAgNyAzLjEgNyA3cy0zLjEgNy03IDdoLTkuM3pNMTA5IDI3Yy0zIDAtNS44IDEuNS03LjUgNGgtLjVjLTIuMiAwLTQtMS44LTQtNHMxLjgtNCA0LTRoNThjMi4yIDAgNCAxLjggNCA0cy0xLjggNC00IDRoLS41Yy0xLjctMi41LTQuNS00LTcuNS00aC00MnpNMzkgMTE1YzQuNCAwIDgtMy42IDgtOHMtMy42LTgtOC04LTggMy42LTggOCAzLjYgOCA4IDh6bTYtOGMwIDMuMy0yLjcgNi02IDZzLTYtMi43LTYtNiAyLjctNiA2LTYgNiAyLjcgNiA2em0tMy0yOXYtMmg4di02SDQwYy0yLjIgMC00IDEuOC00IDR2MTBIMjJsLTEuMyA0LS43IDJoMi4ybDMuOCA0MGgyNmwzLjgtNDBINThsLS43LTItMS4zLTRINDJ2LTZ6bS00LTR2MTBoMlY3NGg4di0yaC04Yy0xLjEgMC0yIC45LTIgMnptMiAxMmgxNC42bC43IDJIMjIuOGwuNy0ySDQwem0xMy44IDRIMjQuMmwzLjYgMzhoMjIuNGwzLjYtMzh6TTEyOSA5MmgtNnY0aC02djRoLTZ2MTRoLTNsLjIgMiAzLjggMzJoMzZsMy44LTMyIC4yLTJoLTN2LTE0aC02di00aC02di00aC04em0xOCAyMnYtMTJoLTR2NGgzdjhoMXptLTMgMHYtNmgtNHY2aDR6bS02IDZ2LTE2aC00djE5LjJjMS42LS43IDMtMS44IDQtMy4yem0tNiAzLjhWMTAwaC00djIzLjhjMS4zLjMgMi43LjMgNCAwem0tNi0uNlYxMDRoLTR2MTZjMSAxLjQgMi40IDIuNSA0IDMuMnptLTYtOS4ydi02aC00djZoNHptLTYgMHYtOGgzdi00aC00djEyaDF6bTI3LTEydi00aC00djRoM3Y0aDF2LTR6bS02IDB2LThoLTR2NGgzdjRoMXptLTYtNHYtNGgtNHY4aDF2LTRoM3ptLTYgNHYtNGgtNHY4aDF2LTRoM3ptNyAyNGM1LjkgMCAxMC45LTQuMiAxMS44LTEwaDcuOWwtMy41IDMwaC0zMi40bC0zLjUtMzBoNy45Yy45IDUuOCA1LjkgMTAgMTEuOCAxMHpNMjEyIDg2djJoLTR2LTJoNHptNCAwaC0ydjJoMnYtMnptLTIwIDBjLTIuNy43LTQuNSAzLjMtMy45IDYgLjQgMS44IDEuNiAzLjIgMy4zIDMuOGwuMS4yIDEuMSA0LjVjLjIuOSAxIDEuNSAxLjkgMS41bDcgMjQuNmMuMi45IDEgMS40IDEuOSAxLjRoNWMuOSAwIDEuNy0uNiAxLjktMS40bDctMjQuNmMuOSAwIDEuNy0uNiAxLjktMS41bDEuMS00LjUuMS0uMmMyLjYtLjkgNC4xLTMuNyAzLjItNi4zLS42LTEuNy0yLTMtMy44LTMuM1Y4NmMwLTcuNy02LjMtMTQtMTQtMTRTMTk2IDc4LjMgMTk2IDg2em00IDBoNnYyaC05Yy0xLjcgMC0zIDEuMy0zIDNzMS4zIDMgMyAzaDI2YzEuNyAwIDMtMS4zIDMtM3MtMS4zLTMtMy0zaC0zdi0yaDJjMC02LjYtNS40LTEyLTEyLTEycy0xMiA1LjQtMTIgMTJoMnptLTEuNCAxNGwtMS00aDI0LjlsLTEgNGgtMjIuOXptOC45IDI2bC02LjktMjRoMTguN2wtNi45IDI0aC00Ljl6TTE1MCAyNDJjMTIuMiAwIDIyLTkuOCAyMi0yMnMtOS44LTIyLTIyLTIyLTIyIDkuOC0yMiAyMiA5LjggMjIgMjIgMjJ6bTI0LTIyYzAgMTMuMy0xMC43IDI0LTI0IDI0cy0yNC0xMC43LTI0LTI0IDEwLjctMjQgMjQtMjQgMjQgMTAuNyAyNCAyNHptLTI4LjQgMTcuN2wyLS45YzEuNS0uNiAzLjItLjYgNC43IDBsMiAuOWMuOS40IDIgMCAyLjUtLjhsMS4xLTEuOWMuOC0xLjQgMi4yLTIuNCAzLjgtMi44bDIuMS0uNWMxLS4yIDEuNi0xLjEgMS41LTIuMWwtLjItMi4yYy0uMS0xLjYuNC0zLjIgMS40LTQuNWwxLjQtMS43Yy43LS44LjctMS45IDAtMi42bC0xLjQtMS43Yy0xLjEtMS4yLTEuNi0yLjgtMS40LTQuNWwuMi0yLjJjLjEtMS0uNi0xLjktMS42LTIuMWwtMi4xLS41Yy0xLjYtLjQtMy0xLjQtMy44LTIuOGwtMS4xLTEuOWMtLjUtLjktMS42LTEuMi0yLjUtLjhsLTIgLjljLTEuNS42LTMuMi42LTQuNyAwbC0yLS45Yy0uOS0uNC0yIDAtMi41LjhsLTEgMi4xYy0uOCAxLjQtMi4yIDIuNC0zLjggMi44bC0yLjEuNWMtMSAuMi0xLjYgMS4xLTEuNSAyLjFsLjIgMi4yYy4xIDEuNi0uNCAzLjItMS40IDQuNWwtMS40IDEuN2MtLjcuOC0uNyAxLjkgMCAyLjZsMS40IDEuN2MxLjEgMS4yIDEuNiAyLjggMS40IDQuNWwtLjIgMi4yYy0uMSAxIC42IDEuOSAxLjYgMi4xbDIuMS41YzEuNi40IDMgMS40IDMuOCAyLjhsMS4xIDEuOWMuNC43IDEuNSAxIDIuNC42em0yLjggMWMxLS40IDIuMS0uNCAzLjEgMGwyIC45YzEuOC44IDQgLjEgNS0xLjZsMS4xLTEuOWMuNi0uOSAxLjUtMS42IDIuNS0xLjhsMi4xLS41YzEuOS0uNCAzLjMtMi4zIDMuMS00LjJsLS4yLTIuMmMtLjEtMS4xLjMtMi4yIDEtM2wxLjQtMS43YzEuMy0xLjUgMS4zLTMuNyAwLTUuMmwtMS40LTEuN2MtLjctLjgtMS4xLTEuOS0xLTNsLjItMi4yYy4yLTItMS4xLTMuOC0zLjEtNC4ybC0yLjEtLjVjLTEuMS0uMi0yLS45LTIuNS0xLjhsLTEuMS0xLjljLTEtMS43LTMuMi0yLjQtNS0xLjZsLTIgLjljLTEgLjQtMi4xLjQtMy4xIDBsLTItLjljLTEuOC0uOC00LS4xLTUgMS42bC0xLjEgMS45Yy0uNi45LTEuNSAxLjYtMi41IDEuOGwtMi4xLjVjLTEuOS40LTMuMyAyLjMtMy4xIDQuMmwuMiAyLjJjLjEgMS4xLS4zIDIuMi0xIDNsLTEuNCAxLjdjLTEuMyAxLjUtMS4zIDMuNyAwIDUuMmwxLjQgMS43Yy43LjggMS4xIDEuOSAxIDNsLS4yIDIuMmMtLjIgMiAxLjEgMy44IDMuMSA0LjJsMi4xLjVjMS4xLjIgMiAuOSAyLjUgMS44bDEuMSAxLjljMSAxLjcgMy4yIDIuNCA1IDEuNmwyLS45ek0xNTIgMjA3YzAtLjYuNC0xIDEtMXMxIC40IDEgMS0uNCAxLTEgMS0xLS40LTEtMXptNiAyYzAtLjYuNC0xIDEtMXMxIC40IDEgMS0uNCAxLTEgMS0xLS40LTEtMXptLTExIDFjMC0uNi40LTEgMS0xczEgLjQgMSAxLS40IDEtMSAxLTEtLjQtMS0xem0tNiAwYzAtLjYuNC0xIDEtMXMxIC40IDEgMS0uNCAxLTEgMS0xLS40LTEtMXptMy01YzAtLjYuNC0xIDEtMXMxIC40IDEgMS0uNCAxLTEgMS0xLS40LTEtMXptLTggOGMwLS42LjQtMSAxLTFzMSAuNCAxIDEtLjQgMS0xIDEtMS0uNC0xLTF6bTMgNmMwLS42LjQtMSAxLTFzMSAuNCAxIDEtLjQgMS0xIDEtMS0uNC0xLTF6bTAgNmMwLS42LjQtMSAxLTFzMSAuNCAxIDEtLjQgMS0xIDEtMS0uNC0xLTF6bTQgN2MwLS42LjQtMSAxLTFzMSAuNCAxIDEtLjQgMS0xIDEtMS0uNC0xLTF6bTUtMmMwLS42LjQtMSAxLTFzMSAuNCAxIDEtLjQgMS0xIDEtMS0uNC0xLTF6bTUgNGMwLS42LjQtMSAxLTFzMSAuNCAxIDEtLjQgMS0xIDEtMS0uNC0xLTF6bTQtNmMwLS42LjQtMSAxLTFzMSAuNCAxIDEtLjQgMS0xIDEtMS0uNC0xLTF6bTYtNGMwLS42LjQtMSAxLTFzMSAuNCAxIDEtLjQgMS0xIDEtMS0uNC0xLTF6bS00LTNjMC0uNi40LTEgMS0xczEgLjQgMSAxLS40IDEtMSAxLTEtLjQtMS0xem00LTNjMC0uNi40LTEgMS0xczEgLjQgMSAxLS40IDEtMSAxLTEtLjQtMS0xem0tNS00YzAtLjYuNC0xIDEtMXMxIC40IDEgMS0uNCAxLTEgMS0xLS40LTEtMXptLTI0IDZjMC0uNi40LTEgMS0xczEgLjQgMSAxLS40IDEtMSAxLTEtLjQtMS0xem0xNiA1YzIuOCAwIDUtMi4yIDUtNXMtMi4yLTUtNS01LTUgMi4yLTUgNSAyLjIgNSA1IDV6bTctNWMwIDMuOS0zLjEgNy03IDdzLTctMy4xLTctNyAzLjEtNyA3LTcgNyAzLjEgNyA3em04Ni0yOWMtLjYgMC0xIC40LTEgMXMuNCAxIDEgMWgyYy42IDAgMS0uNCAxLTFzLS40LTEtMS0xaC0yem0xOSA5YzAtLjYuNC0xIDEtMWgyYy42IDAgMSAuNCAxIDFzLS40IDEtMSAxaC0yYy0uNiAwLTEtLjQtMS0xem0tMTQgNWMtLjYgMC0xIC40LTEgMXMuNCAxIDEgMWgyYy42IDAgMS0uNCAxLTFzLS40LTEtMS0xaC0yem0tMjUgMWMtLjYgMC0xIC40LTEgMXMuNCAxIDEgMWgyYy42IDAgMS0uNCAxLTFzLS40LTEtMS0xaC0yem01IDRjLS42IDAtMSAuNC0xIDFzLjQgMSAxIDFoMmMuNiAwIDEtLjQgMS0xcy0uNC0xLTEtMWgtMnptOSAwYzAtLjYuNC0xIDEtMWgyYy42IDAgMSAuNCAxIDFzLS40IDEtMSAxaC0yYy0uNiAwLTEtLjQtMS0xem0xNSAxYzAtLjYuNC0xIDEtMWgyYy42IDAgMSAuNCAxIDFzLS40IDEtMSAxaC0yYy0uNiAwLTEtLjQtMS0xem0xMi0yYy0uNiAwLTEgLjQtMSAxcy40IDEgMSAxaDJjLjYgMCAxLS40IDEtMXMtLjQtMS0xLTFoLTJ6bS0xMS0xNGMwLS42LjQtMSAxLTFoMmMuNiAwIDEgLjQgMSAxcy0uNCAxLTEgMWgtMmMtLjYgMC0xLS40LTEtMXptLTE5IDBjLS42IDAtMSAuNC0xIDFzLjQgMSAxIDFoMmMuNiAwIDEtLjQgMS0xcy0uNC0xLTEtMWgtMnptNiA1YzAtLjYuNC0xIDEtMWgyYy42IDAgMSAuNCAxIDFzLS40IDEtMSAxaC0yYy0uNiAwLTEtLjQtMS0xem0tMjUgMTV2LTEuNGMtMi41LTEuMS0zLjctNC0yLjYtNi42LjItLjUuNS0xIC45LTEuNC0uOS0yIDAtNC4yIDEuOS01LjItLjgtMi42LjctNS40IDMuNC02LjIuNC0uNS45LS45IDEuNS0xLjEuNS0yLjcgMy4xLTQuNSA1LjgtNC4xLjcuMSAxLjQuNCAyIC44IDUuMy0zLjggMTEuNi01LjkgMTguMi01LjkgNi44IDAgMTMuMSAyLjIgMTguMiA1LjkgMi4zLTEuNiA1LjQtMSA3IDEuMy40LjYuNyAxLjMuOCAyIC42LjIgMS4xLjYgMS41IDEuMSAyLjcuOCA0LjIgMy41IDMuNCA2LjIgMS45IDEgMi43IDMuMiAxLjkgNS4yIDEuOSAyIDEuOCA1LjItLjIgNy0uNC40LS45LjctMS41IDF2Mi40aC02MnYtMWgtLjJ6bS44LTcuMmMtLjMgMS4yLS41IDIuNC0uNiAzLjYtMS4zLTEtMS42LTIuOS0uNi00LjIuNC4zLjguNSAxLjIuNnptMS41LTQuNmMtLjQuOS0uNyAxLjgtMSAyLjctMS0uNC0xLjYtMS41LTEuMy0yLjUuMi0uNS42LS45IDEuMS0xLjIuNC40LjguNyAxLjIgMXptMi4zLTQuNWwtMS41IDIuN2MtMS4zLTEtMS41LTIuOS0uNS00LjIuMS0uMi4zLS4zLjQtLjUuMy45LjkgMS42IDEuNiAyem0xLjItMS43Yy40LS41LjctMSAxLjEtMS41LS4zLS41LS45LS43LTEuNC0uNHMtLjcuOS0uNCAxLjRjLjIuMi40LjQuNy41em01LjMtNS44Yy0xIC45LTIgMS44LTIuOSAyLjgtLjMtLjMtLjctLjYtMS4xLS44LjQtMS42IDIuMS0yLjUgMy43LTIuMS4xIDAgLjIuMS4zLjF6bTQyLjcgMi44Yy0uOS0xLTEuOS0xLjktMi45LTIuOCAxLjUtLjYgMy4zLjEgMy45IDEuNyAwIC4xLjEuMi4xLjMtLjQuMi0uOC40LTEuMS44em0xLjMgMS41Yy40LjUuOCAxIDEuMSAxLjQuNS0uMS45LS43LjgtMS4ycy0uNy0uOS0xLjItLjhjLS4zLjItLjUuNC0uNy42em0zLjggNS45bC0xLjUtMi43Yy44LS40IDEuNC0xLjEgMS42LTIgMS4zIDEuMSAxLjQgMyAuNCA0LjItLjIuMi0uNC4zLS41LjV6bTEuNyA0LjVjLS4zLS45LS42LTEuOC0xLTIuNy40LS4zLjgtLjYgMS4yLTEgMSAuNSAxLjQgMS43IDEgMi43LS4yLjQtLjYuOC0xLjIgMXptMS4yIDUuNWMtLjEtMS4yLS40LTIuNC0uNi0zLjYuNS0uMS45LS40IDEuMi0uNiAxIDEuMy43IDMuMi0uNiA0LjJ6TTI3NSAyMTRjLS41LTE2LTEzLjktMjguNi0yOS45LTI4LjEtMTUuMy41LTI3LjYgMTIuOC0yOC4xIDI4LjFoNTh6TTcyLjMgMTk4LjFjLS4yLS4zLS4zLS43LS4zLTEuMXYtMTJoLTJ2MTJjMCAyLjIgMS44IDQgNCA0IDEuMiAwIDIuMy0uNSAzLjEtMS40LjYtLjcuOS0xLjYuOS0yLjV2LTEyaC0ydjEyYzAgMS4xLS45IDItMiAyLS43LS4xLTEuMy0uNC0xLjctMXpNNzUgMTc2Yy40IDAgLjcgMCAxLjEtLjEuNSAyLjIgMi42IDMuNSA0LjggMyAuNS0uMSAxLS4zIDEuNC0uNiAxLjEgMi4xIDEuNyA0LjQgMS43IDYuN3YyNGMwIDMuMy0yLjcgNi02IDZoLTN2OWMwIDIuOC0yLjIgNS01IDVzLTUtMi4yLTUtNXYtOWgtM2MtMy4zIDAtNi0yLjctNi02di0yNGMwLTcuNyA2LjMtMTQgMTQtMTQgMCAyLjggMi4yIDUgNSA1em0tMTcgMTV2MTJjMCAuOC41IDEuNSAxLjIgMS44LjkuNCAxLjkuMSAyLjQtLjcuMi0uMy4zLS43LjMtMS4xdi0xMmgydjEyYzAgMi4yLTEuNyA0LTMuOSA0LS41IDAtMS0uMS0xLjQtLjItLjItLjEtLjQtLjItLjctLjN2Mi41YzAgMi4yIDEuOCA0IDQgNGgxNmMyLjIgMCA0LTEuOCA0LTR2LTI0YzAtMS41LS4yLTIuOS0uNy00LjItLjQuMS0uOS4yLTEuMy4yLTIuMSAwLTQuMS0xLjEtNS4yLTMtMy0uMS01LjYtMi02LjUtNC45QzYyLjQgMTc0IDU4IDE3OSA1OCAxODV2NnptOSAyNHY5YzAgMS43IDEuMyAzIDMgM3MzLTEuMyAzLTN2LTloLTZ6TS0xNyAxOTFjLS42IDAtMSAuNC0xIDFzLjQgMSAxIDFoMmMuNiAwIDEtLjQgMS0xcy0uNC0xLTEtMWgtMnptMTkgOWMwLS42LjQtMSAxLTFoMmMuNiAwIDEgLjQgMSAxcy0uNCAxLTEgMUgzYy0uNiAwLTEtLjQtMS0xem0tMTQgNWMtLjYgMC0xIC40LTEgMXMuNCAxIDEgMWgyYy42IDAgMS0uNCAxLTFzLS40LTEtMS0xaC0yem0tMjUgMWMtLjYgMC0xIC40LTEgMXMuNCAxIDEgMWgyYy42IDAgMS0uNCAxLTFzLS40LTEtMS0xaC0yem01IDRjLS42IDAtMSAuNC0xIDFzLjQgMSAxIDFoMmMuNiAwIDEtLjQgMS0xcy0uNC0xLTEtMWgtMnptOSAwYzAtLjYuNC0xIDEtMWgyYy42IDAgMSAuNCAxIDFzLS40IDEtMSAxaC0yYy0uNiAwLTEtLjQtMS0xem0xNSAxYzAtLjYuNC0xIDEtMWgyYy42IDAgMSAuNCAxIDFzLS40IDEtMSAxaC0yYy0uNiAwLTEtLjQtMS0xem0xMi0yYy0uNiAwLTEgLjQtMSAxcy40IDEgMSAxaDJjLjYgMCAxLS40IDEtMXMtLjQtMS0xLTFINHptLTExLTE0YzAtLjYuNC0xIDEtMWgyYy42IDAgMSAuNCAxIDFzLS40IDEtMSAxaC0yYy0uNiAwLTEtLjQtMS0xem0tMTkgMGMtLjYgMC0xIC40LTEgMXMuNCAxIDEgMWgyYy42IDAgMS0uNCAxLTFzLS40LTEtMS0xaC0yem02IDVjMC0uNi40LTEgMS0xaDJjLjYgMCAxIC40IDEgMXMtLjQgMS0xIDFoLTJjLS42IDAtMS0uNC0xLTF6bS0yNSAxNXYtMS40Yy0yLjUtMS4xLTMuNy00LTIuNi02LjYuMi0uNS41LTEgLjktMS40LS45LTIgMC00LjIgMS45LTUuMi0uOC0yLjYuNy01LjQgMy40LTYuMi40LS41LjktLjkgMS41LTEuMS41LTIuNyAzLjEtNC41IDUuOC00LjEuNy4xIDEuNC40IDIgLjggNS4zLTMuOCAxMS42LTUuOSAxOC4yLTUuOSA2LjggMCAxMy4xIDIuMiAxOC4yIDUuOSAyLjMtMS42IDUuNC0xIDcgMS4zLjQuNi43IDEuMy44IDIgLjYuMiAxLjEuNiAxLjUgMS4xIDIuNy44IDQuMiAzLjUgMy40IDYuMiAxLjkgMSAyLjcgMy4yIDEuOSA1LjIgMS45IDIgMS44IDUuMi0uMiA3LS40LjQtLjkuNy0xLjUgMXYyLjRoLTYydi0xaC0uMnptLjgtNy4yYy0uMyAxLjItLjUgMi40LS42IDMuNi0xLjMtMS0xLjYtMi45LS42LTQuMi40LjMuOC41IDEuMi42em0xLjUtNC42Yy0uNC45LS43IDEuOC0xIDIuNy0xLS40LTEuNi0xLjUtMS4zLTIuNS4yLS41LjYtLjkgMS4xLTEuMi40LjQuOC43IDEuMiAxem0yLjMtNC41bC0xLjUgMi43Yy0xLjMtMS0xLjUtMi45LS41LTQuMi4xLS4yLjMtLjMuNC0uNS4zLjkuOSAxLjYgMS42IDJ6bTEuMi0xLjdjLjMtLjUuNy0xIDEuMS0xLjUtLjMtLjUtLjktLjctMS40LS40cy0uNy45LS40IDEuNGMuMi4yLjQuNC43LjV6bTUuMy01LjhjLTEgLjktMiAxLjgtMi45IDIuOC0uMy0uMy0uNy0uNi0xLjEtLjguNC0xLjYgMi4xLTIuNSAzLjctMi4xLjEgMCAuMi4xLjMuMXpNOC44IDE5NGMtLjktMS0xLjktMS45LTIuOS0yLjggMS41LS42IDMuMy4xIDMuOSAxLjcgMCAuMS4xLjIuMS4zLS40LjItLjguNC0xLjEuOHptMS4zIDEuNWMuNC41LjggMSAxLjEgMS40LjUtLjEuOS0uNy44LTEuMi0uMS0uNS0uNy0uOS0xLjItLjgtLjMuMi0uNS40LS43LjZ6bTMuOCA1LjljLS41LS45LS45LTEuOC0xLjUtMi43LjgtLjQgMS40LTEuMSAxLjYtMiAxLjMgMS4xIDEuNCAzIC40IDQuMi0uMi4yLS40LjMtLjUuNXptMS44IDQuNWMtLjMtLjktLjYtMS44LTEtMi43LjQtLjMuOC0uNiAxLjItMSAxIC41IDEuNCAxLjcgMSAyLjctLjMuNC0uNy44LTEuMiAxem0xLjEgNS41Yy0uMS0xLjItLjQtMi40LS42LTMuNi41LS4xLjktLjQgMS4yLS42IDEgMS4zLjcgMy4yLS42IDQuMnpNMTUgMjE0Yy0uNS0xNi0xMy45LTI4LjYtMjkuOS0yOC4xLTE1LjMuNS0yNy42IDEyLjgtMjguMSAyOC4xaDU4eiIvPjwvZz48L3N2Zz4=);
}
</style>
@if (!session()->has('selectedDevice'))
		<div class="card shadow-sm border-0">
			<div class="alert alert-danger m-4">
				<div class="text-center">{{ __('Please select a device first') }}</div>
			</div>
		</div>
@elseif (session('admin_id'))
		<div class="card shadow-sm border-0">
			<div class="alert alert-danger m-4">
				<div class="text-center">{{ __('For the privacy, access to the chat has been blocked.') }}</div>
			</div>
		</div>
@else
<link rel="stylesheet" href="{{ asset('vendor/css/pages/app-chat.css') }}" />

  <div class="app-chat card overflow-hidden">
    <div class="row g-0">

      <div class="col app-chat-sidebar-left app-sidebar overflow-hidden" id="app-chat-sidebar-left">
		  <div class="chat-sidebar-left-user sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-6 pt-12">
			<div class="avatar avatar-xl chat-sidebar-avatar">
			  <span class="avatar-initial rounded-circle bg-label-primary">{{ substr($deviceId, -2) }}</span>
			</div>
			<h5 class="mt-4 mb-0">
			  <span id="session-name-text">{{ auth()->user()->username }}</span>
			</h5>
			<span>{{ $deviceId }}</span>
			<i class="icon-base ti tabler-x icon-lg cursor-pointer close-sidebar" data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-left"></i>
		  </div>

		  <div class="sidebar-body px-6 pb-6">
			<div class="my-6">
			  <p class="text-uppercase text-body-secondary mb-1">{{ __('Settings') }}</p>
			  <ul class="list-unstyled d-grid gap-4 ms-2 pt-2 text-heading">
				<li class="d-flex justify-content-between align-items-center">
				  <div>
					<i class="icon-base ti tabler-code-variable-plus icon-md me-1"></i>
					<span class="align-middle">{{ __('Available') }}</span>
				  </div>
				  <div class="form-check form-switch mb-0 me-1">
					<input type="checkbox" class="form-check-input" id="switch-available" data-id="{{ $deviceId }}" data-url="{{ route('setAvailable') }}" data-key="set_available" {{ !empty($isAvailable) && $isAvailable ? 'checked' : '' }} />
				  </div>
				</li>
				<li class="d-flex justify-content-between align-items-center">
				  <div>
					<i class="icon-base ti tabler-phone-off icon-md me-1"></i>
					<span class="align-middle">{{ __('Reject Call') }}</span>
				  </div>
				  <div class="form-check form-switch mb-0 me-1">
					<input type="checkbox" class="form-check-input" id="switch-reject" data-id="{{ $deviceId }}" data-url="{{ route('setHookReject') }}" data-key="webhook_reject_call" {{ !empty($isRejectCall) && $isRejectCall ? 'checked' : '' }} />
				  </div>
				</li>
				<li class="d-flex justify-content-between align-items-center">
				  <div>
					<i class="icon-base ti tabler-messages icon-md me-1"></i>
					<span class="align-middle">{{ __('Messages Read') }}</span>
				  </div>
				  <div class="form-check form-switch mb-0 me-1">
					<input type="checkbox" class="form-check-input" id="switch-read" data-id="{{ $deviceId }}" data-url="{{ route('setHookRead') }}" data-key="webhook_read" {{ !empty($isMessagesRead) && $isMessagesRead ? 'checked' : '' }} />
				  </div>
				</li>
			  </ul>
			</div>
		  </div>
		</div>

      <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end" id="app-chat-contacts">
        <div class="sidebar-header h-px-75 px-5 border-bottom d-flex align-items-center">
          <div class="d-flex align-items-center me-6 me-lg-0">
            <div class="flex-shrink-0 avatar avatar-online me-4"
                 data-bs-toggle="sidebar"
                 data-overlay="app-overlay-ex"
                 data-target="#app-chat-sidebar-left">
              <span class="avatar-initial rounded-circle bg-label-primary">{{substr($deviceId, -2)}}</span>
            </div>
            <div class="flex-grow-1 input-group input-group-merge">
              <span class="input-group-text" id="basic-addon-search31">
                <i class="icon-base ti tabler-search icon-xs"></i>
              </span>
              <input type="text"
                     class="form-control chat-search-input"
                     placeholder="{{ __('Search...') }}"
                     aria-label="{{ __('Search...') }}"
                     aria-describedby="basic-addon-search31" />
            </div>
          </div>
          <i class="icon-base ti tabler-x icon-lg cursor-pointer position-absolute top-50 end-0 translate-middle d-lg-none d-block"
             data-overlay
             data-bs-toggle="sidebar"
             data-target="#app-chat-contacts"></i>
        </div>
        <div class="sidebar-body">
          <ul class="list-unstyled chat-contact-list py-2 mb-0" id="chat-list">
            <li class="chat-contact-list-item chat-contact-list-item-title mt-0">
              <h5 class="text-primary mb-0">{{ __('Chats') }}</h5>
            </li>
            <li class="chat-contact-list-item chat-list-item-0 d-none">
              <h6 class="text-body-secondary mb-0">{{ __('No Chats Found') }}</h6>
            </li>
            @foreach($sessions as $session)
			  <li
				class="chat-contact-list-item mb-1"
				data-session-id="{{ $session->id }}"
				data-session-body="{{ $session->body ?? '' }}"
				data-session-phone="{{ $session->phone_number }}"
				data-push-name="{{ $session->push_name ? $session->push_name : $session->phone_number }}"
				data-profile-sender="{{ $session->profile_sender ?? '' }}"
				data-profile-receive="{{ $session->profile_receive ?? '' }}"
				data-stop-ai="{{ $session->stop_ai ?? 0 }}"
				data-cs-name="{{ $session->cs_name ?? '' }}"
			  >
				<a class="d-flex align-items-center">
				  <div class="flex-shrink-0 avatar">
					@if(!empty($session->profile_sender))
					  <img src="{{ $session->profile_sender }}" class="rounded-circle" />
					@else
					  <span class="avatar-initial rounded-circle bg-label-primary">
						{{ strtoupper(substr($session->phone_number, -2)) }}
					  </span>
					@endif
				  </div>
				  <div class="chat-contact-info flex-grow-1 ms-4 text-truncate">
					<div class="d-flex justify-content-between align-items-center">
					  <h6 class="chat-contact-name text-truncate m-0 fw-normal">
						{{ $session->push_name ? $session->push_name : $session->phone_number }}
					  </h6>
					  <small class="chat-contact-list-item-time">
						{{ $session->updated_at->diffForHumans() }}
					  </small>
					</div>
					<small class="chat-contact-status">
					  {{ __($session->last_message) }}
					</small>
				  </div>
				</a>
			  </li>
			@endforeach
          </ul>
        </div>
      </div>

      <div class="col app-chat-conversation d-flex align-items-center justify-content-center flex-column" id="app-chat-conversation">
        <div class="bg-label-primary p-8 rounded-circle">
          <i class="icon-base ti tabler-message-2 icon-50px"></i>
        </div>
        <p class="my-4">{{ __('Select a contact to start a conversation.') }}</p>
        <button class="btn btn-primary app-chat-conversation-btn" id="app-chat-conversation-btn">{{ __('Select Contact') }}</button>
      </div>

      <div class="col app-chat-history d-none" id="app-chat-history">
        <div class="chat-history-wrapper">
          <div class="chat-history-header border-bottom">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex overflow-hidden align-items-center">
                <i class="icon-base ti tabler-menu-2 icon-lg cursor-pointer d-lg-none d-block me-4"
                   data-bs-toggle="sidebar"
                   data-overlay
                   data-target="#app-chat-contacts"></i>
                <div class="flex-shrink-0 avatar" data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-right">
                  <img src="{{ asset('img/avatars/1.png') }}" alt="{{ __('Avatar') }}" class="rounded-circle" /></a>
                </div>
                <div class="chat-contact-info flex-grow-1 ms-4">
				  <h6 class="m-0 fw-normal">{{ $currentContactName ?? __('Contact') }}</h6>
				  <small class="user-status text-body"></small>
				</div>
              </div>
              <div class="d-flex align-items-center">
				<span id="ai-toggle-icon" class="btn btn-text-secondary cursor-pointer d-sm-inline-flex d-none me-1 btn-icon rounded-pill">
				  <i class="icon-base ti tabler-ai icon-22px"></i>
				</span>
                <span class="btn btn-text-secondary cursor-pointer d-sm-inline-flex d-none me-1 btn-icon rounded-pill">
                  <i class="icon-base ti tabler-phone icon-22px"></i>
                </span>
                <span class="btn btn-text-secondary cursor-pointer d-sm-inline-flex d-none me-1 btn-icon rounded-pill">
                  <i class="icon-base ti tabler-video icon-22px"></i>
                </span>
                <div class="dropdown">
                  <button class="btn btn-icon btn-text-secondary text-secondary rounded-pill dropdown-toggle hide-arrow"
                          data-bs-toggle="dropdown" aria-expanded="true" id="chat-header-actions">
                    <i class="icon-base ti tabler-dots-vertical icon-22px"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="chat-header-actions">
					  <a class="dropdown-item" id="view-contact" href="javascript:void(0);" data-bs-toggle="sidebar" data-overlay data-target="#app-chat-sidebar-right">{{ __('View Contact') }}</a>
					  <a class="dropdown-item" id="change-cs-name" href="javascript:void(0);">{{ __('Change CS Name') }}</a>
					  <a class="dropdown-item" id="toggle-ai" href="javascript:void(0);">{{ __('Stop AI from conversation') }}</a>
					  <a class="dropdown-item text-danger" id="delete-conversation" href="javascript:void(0);">{{ __('Delete conversation') }}</a>
				  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="chat-history-body">
            <ul class="list-unstyled chat-history" id="messages-list"></ul>
          </div>
          <div class="chat-history-footer shadow-xs">
            <form class="form-send-message d-flex justify-content-between align-items-center" id="form-send-message">
			  <textarea rows="1" class="form-control message-input border-0 me-4 shadow-none" placeholder="{{ __('Type your message ...') }}" style="line-height:1.5; max-height:3em; overflow:auto; resize:none;"></textarea>
			  <div class="message-actions d-flex align-items-center position-relative">
				<div class="dropdown me-0">
				  <button type="button" class="btn btn-text-secondary btn-icon rounded-pill cursor-pointer dropdown-toggle" id="attach-btn" data-bs-toggle="dropdown" aria-expanded="false">
					<i class="icon-base ti tabler-paperclip icon-22px text-heading"></i>
				  </button>
				  <ul class="dropdown-menu dropdown-menu-end shadow" id="attach-menu">
					<li><a class="dropdown-item d-flex align-items-center" href="#" data-action="document"><i class="icon-base ti tabler-file icon-md me-2"></i> {{ __('Document') }}</a></li>
					<li><a class="dropdown-item d-flex align-items-center" href="#" data-action="media"><i class="icon-base ti tabler-photo icon-md me-2"></i> {{ __('Photos & Videos') }}</a></li>
					<li><a class="dropdown-item d-flex align-items-center" href="#" data-action="camera"><i class="icon-base ti tabler-camera icon-md me-2"></i> {{ __('Camera') }}</a></li>
					<li><a class="dropdown-item d-flex align-items-center" href="#" data-action="audio"><i class="icon-base ti tabler-microphone icon-md me-2"></i> {{ __('Audio Clip') }}</a></li>
				  </ul>
				  <input type="file" id="file-input-document" class="d-none" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,text/plain,application/zip,application/x-7z-compressed,application/x-rar-compressed">
				  <input type="file" id="file-input-media" class="d-none" accept="image/*,video/mp4,video/3gpp,video/quicktime">
				  <input type="file" id="file-input-camera" class="d-none" accept="image/*" capture="environment">
				  <input type="file" id="file-input-audio" class="d-none" accept="audio/wav,audio/mp3,audio/ogg,audio/aac,audio/mpeg">
				</div>

				<button type="button" class="btn btn-text-secondary btn-icon rounded-pill cursor-pointer ms-0 me-2" id="emoji-btn">
				  <i class="icon-base ti tabler-mood-smile icon-22px text-heading"></i>
				</button>

				<button type="submit" class="btn btn-primary d-flex send-msg-btn">
				  <span class="align-middle d-md-inline-block d-none">{{ __('Send') }}</span>
				  <i class="icon-base ti tabler-send icon-16px ms-md-2 ms-0"></i>
				</button>
			  </div>
			</form>
          </div>
        </div>
      </div>

      <div class="col app-chat-sidebar-right app-sidebar overflow-hidden" id="app-chat-sidebar-right">
        <div class="sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-6 pt-12">
          <div class="avatar avatar-xl chat-sidebar-avatar">
            <img src="{{ asset('img/avatars/1.png') }}" alt="{{ __('Avatar') }}" class="rounded-circle" />
          </div>
          <h5 class="mt-4 mb-0">{{ $currentContactName ?? __('Contact') }}</h5>
          <span>{{ $currentContactRole ?? __('Online') }}</span>
          <i class="icon-base ti tabler-x icon-lg cursor-pointer close-sidebar d-block"
             data-bs-toggle="sidebar"
             data-overlay
             data-target="#app-chat-sidebar-right"></i>
        </div>
        <div class="sidebar-body p-6 pt-0">
          <p class="text-uppercase mb-1 text-body-secondary">{{ __('About') }}</p>
          <p class="mb-0">{{ $currentContactAbout ?? __('No information available.') }}</p>
        </div>
      </div>

      <div class="app-overlay"></div>
    </div>
  </div>
<div class="modal fade" id="csNameModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title">{{__('Change Conversation Name')}}</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="cs-name-input" placeholder="{{__('Custom name')}}">
        <small class="text-body-secondary d-block mt-2">{{__('Leave it empty if you don’t want to name the conversation.')}}</small>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="save-cs-name">{{__('Edit')}}</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0 position-relative">
      <button type="button"
              class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
              data-bs-dismiss="modal"
              aria-label="Close"></button>
      <div class="modal-body p-0 d-flex justify-content-center">
        <img id="imageModalImg"
             src=""
             class="img-fluid"
             style="max-height: 80vh; width: auto;"
             alt="Preview">
      </div>
    </div>
  </div>
</div>
<div id="emoji-portal" class="d-none" style="position:fixed; z-index:2000;"></div>
<script src="https://cdn.socket.io/4.8.1/socket.io.min.js"></script>
<script>
  let Lang = [];
  const NowLang = "{{ __('Now') }}";
  const FetchUrl = "{{ route('chat.messages', ':id') }}";
  Lang['Audio'] = '{{__("Audio")}}';
  Lang['Video'] = '{{__("Video")}}';
  Lang['Document'] = '{{__("Document")}}';
  Lang['Sticker'] = '{{__("Sticker")}}';
  Lang['Image'] = '{{__("Image")}}';
  Lang['VCard'] = '{{__("VCard")}}';
  Lang['DeleteThis'] = '{{__("Delete this conversation?")}}';
  Lang['StartStopAI'] = '{{__("Start/Stop AI updated")}}';
  window.currentUserId = {{ auth()->id() }};
  window.selectedDeviceBody = "{{ session()->get('selectedDevice')['device_body'] ?? '' }}";
  let socket;
  if ('{{ env('TYPE_SERVER') }}' === 'hosting') {
    socket = io();
  } else {
    socket = io('{{ env('WA_URL_SERVER') }}', {
      transports: ['websocket','polling','flashsocket']
    });
  }
  socket.emit('authenticate', { userId: {{ auth()->id() }} });

  var csrfMeta = document.querySelector('meta[name="csrf-token"]');
  var csrf = csrfMeta ? csrfMeta.getAttribute('content') : '';

  function postForm(url, formData) {
    return fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' }, body: formData });
  }

  function onToggleChange(e) {
    var el = e.target;
    var url = el.getAttribute('data-url');
    var id = el.getAttribute('data-id');
    var val = el.checked ? 1 : 0;
    var fd = new FormData();
    fd.append('id', id);
    fd.append('value', val);
    postForm(url, fd).then(function(r){ return r.ok ? r.json() : Promise.reject(); }).catch(function(){ el.checked = !el.checked; });
  }

  var csrfMeta = document.querySelector('meta[name="csrf-token"]');
  var csrf = csrfMeta ? csrfMeta.getAttribute('content') : '';
  var notyf = window.notyf || (typeof Notyf !== 'undefined' ? new Notyf({ duration: 3000, position: { x: 'right', y: 'top' } }) : { success: function(){}, error: function(){} });

  function postForm(url, formData) {
    return fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' }, body: formData });
  }

  function onToggleChange(e) {
    var el = e.target;
    var url = el.getAttribute('data-url');
    var id = el.getAttribute('data-id');
    var key = el.getAttribute('data-key');
    var val = el.checked ? 1 : 0;
    var fd = new FormData();
    fd.append(key, val);
    fd.append('id', id);
    postForm(url, fd)
      .then(function(r){ return r.json(); })
      .then(function(j){
        if (j && j.error === false) notyf.success(j.msg || 'Updated');
        else {
          notyf.error((j && j.msg) ? j.msg : 'Error');
          el.checked = !el.checked;
        }
      })
      .catch(function(){
        notyf.error('{{__("Network error")}}');
        el.checked = !el.checked;
      });
  }

  var swAvail = document.getElementById('switch-available');
  var swReject = document.getElementById('switch-reject');
  var swRead = document.getElementById('switch-read');
  if (swAvail) swAvail.addEventListener('change', onToggleChange);
  if (swReject) swReject.addEventListener('change', onToggleChange);
  if (swRead) swRead.addEventListener('change', onToggleChange);

document.addEventListener('DOMContentLoaded', () => {
  var csrfMeta = document.querySelector('meta[name="csrf-token"]');
  var csrf = csrfMeta ? csrfMeta.getAttribute('content') : '';
  var notyf = window.notyf || (typeof Notyf !== 'undefined' ? new Notyf({ duration: 3000, position: { x: 'right', y: 'top' } }) : { success: function(){}, error: function(){} });

  function postForm(url, formData) {
    return fetch(url, { method: 'POST', headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' }, body: formData });
  }

  function onToggleChange(e) {
    var el = e.target;
    var url = el.getAttribute('data-url');
    var id = el.getAttribute('data-id');
    var key = el.getAttribute('data-key');
    var val = el.checked ? 1 : 0;
    var fd = new FormData();
    fd.append(key, val);
    fd.append('id', id);
    postForm(url, fd)
      .then(function(r){ return r.json(); })
      .then(function(j){
        if (j && j.error === false) notyf.success(j.msg || 'Updated');
        else {
          notyf.error((j && j.msg) ? j.msg : 'Error');
          el.checked = !el.checked;
        }
      })
      .catch(function(){
        notyf.error('Network error');
        el.checked = !el.checked;
      });
  }

  var swAvail = document.getElementById('switch-available');
  var swReject = document.getElementById('switch-reject');
  var swRead = document.getElementById('switch-read');
  if (swAvail) swAvail.addEventListener('change', onToggleChange);
  if (swReject) swReject.addEventListener('change', onToggleChange);
  if (swRead) swRead.addEventListener('change', onToggleChange);

  var changeBtn = document.getElementById('change-cs-name');
  var csInput = document.getElementById('cs-name-input');
  var saveBtn = document.getElementById('save-cs-name');
  var modalEl = document.getElementById('csNameModal');
  var bsModal = modalEl ? bootstrap.Modal.getOrCreateInstance(modalEl) : null;

  function currentLi() {
    return window.currentSessionId ? document.querySelector('[data-session-id="' + window.currentSessionId + '"]') : null;
  }

  if (changeBtn && bsModal) {
    changeBtn.addEventListener('click', function(){
      if (!window.currentSessionId) { notyf.error('{{__("Select a conversation first")}}'); return; }
      var li = currentLi();
      var preset = li ? (li.dataset.csName || '') : '';
      csInput.value = preset;
      bsModal.show();
      setTimeout(function(){ csInput.focus(); }, 120);
    });
  }

  if (saveBtn) {
    saveBtn.addEventListener('click', function(){
      if (!window.currentSessionId) { notyf.error('{{__("Select a conversation first")}}'); return; }
      var val = csInput.value.trim();
      var fd = new FormData();
      fd.append('session_id', window.currentSessionId);
      fd.append('cs_name', val);
      fetch('{{ route('chat.session.setName') }}', { method: 'POST', headers: { 'X-CSRF-TOKEN': csrf, 'Accept': 'application/json' }, body: fd })
        .then(function(r){ if (!r.ok) throw new Error(); return r.json().catch(function(){ return { ok: true }; }); })
        .then(function(){
		  var li = currentLi();
		  if (li) li.dataset.csName = val || '';
		  if (typeof window !== 'undefined' && String(window.currentSessionId || '') !== '') window.currentCsName = val || '';
		  notyf.success('{{__("Conversation name updated")}}');
		  bsModal.hide();
		})
        .catch(function(){ notyf.error('{{__("Failed to update name")}}'); });
    });
  }
});
</script>
<script type="module" src="{{ asset('js/emoji/picker.min.js') }}"></script>
<script src="{{ asset('js/app-chat.js') }}"></script>
@endif
</x-layout-dashboard>
