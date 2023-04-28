name: Publish Backend to Main
on:
  push:
    branches:
      - main

jobs:
  FTP-Deploy-Action:
    name: FTP-Deploy-Action
    runs-on: ubuntu-latest
    steps:
    - uses: actions/checkout@v2.1.0
      with:
        fetch-depth: 2
    - run: composer --version && php --version
    - name: FTP-Deploy-Action
      uses: SamKirkland/FTP-Deploy-Action@4.3.3
      with:
        server: ${{ secrets.FTP_SERVER }}
        username: ${{ secrets.FTP_USERNAME_DEV }}
        password: ${{ secrets.FTP_PASSWORD_DEV }}
