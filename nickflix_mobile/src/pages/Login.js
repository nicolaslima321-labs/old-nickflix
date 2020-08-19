// In App.js in a new project

import * as React from 'react';
import { Button, View, Text, TextInput, Image, StatusBar, StyleSheet, TouchableOpacity } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';

import axios from 'axios'

function Login ({ navigation }) {
  const [login, setLogin] = React.useState(null)
  const [password, setPassword] = React.useState(null)

  function authenticate() {
    const API = "http://api.nickflix:8001/api"

    const data = {
      email: login,
      password: password
    }
  
    axios.post(`${API}/auth/login`, data)
      .then((response) => {
        console.log("Deu bom", data)
        console.log(response.data)
      })
      .catch((error) => {
        console.log("Deu ruim", data)
        console.log(error)
      })
  }

  return (
    <View style={{ flex: 1, alignItems: 'center', justifyContent: 'center', backgroundColor: '#000', paddingBottom: 50}}>
      <StatusBar
        backgroundColor="black"
        barStyle="ligth-content"
      />
      <TextInput
        underlineColorAndroid = "transparent"
        placeholder = "E-mail ou Número de Telefone"
        placeholderTextColor = "grey"
        style={ styles.inputFields }
        onChangeText={() => setLogin}
      />
      <TextInput
        underlineColorAndroid = "transparent"
        placeholder = "Senha"
        placeholderTextColor = "grey"
        style={ styles.inputFields }
        onChangeText={() => setPassword}
      />
      <TouchableOpacity
        style={ styles.buttonFields }
        onPress={() => authenticate()}
      >
        <Text style={{ color: "#fff" }}>Entrar</Text>
      </TouchableOpacity>

      <Text style={{ paddingTop: 12, color: "#fff" }}>Precisa de Ajuda?</Text>
      <Text style={{ paddingTop: 25, color: "#fff", fontWeight: "bold" }}>Novo por aqui? Increva-se agora.</Text>
      <View style={{ alignItems: "center", alignContent: "center", alignSelf: "center", justifyContent: "center" }}>
        <Text style={{ paddingTop: 25, color: "#fff", maxWidth: 360, fontSize: 10 }}>O acesso está protegido pelo Google reCAPTCHA. para garantir que você</Text>
        <Text style={{ color: "#fff", fontSize: 10 }}>não é um "robô". Saiba mais.</Text>
      </View>      

    </View>
  );
}

const styles = StyleSheet.create({
  inputFields: {
    marginTop: 15,
    fontSize: 15,
    borderRadius: 5,
    paddingLeft: 15,
    width: 360,
    height: 60,
    borderColor: 'grey',
    borderWidth: 1,
    backgroundColor: "rgba(46, 49, 49, 1)",
  },
  buttonFields: {
    marginTop: 35,
    borderRadius: 5,
    borderWidth: 1.5,
    width: 360,
    alignItems: "center",
    borderColor: "white",
    padding: 10,
    backgroundColor: "transparent",
  },
});

export default Login;