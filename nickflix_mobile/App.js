// In App.js in a new project

import * as React from 'react';
import { Button, View, Text, Image, Component } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';

import Routes from './src/routes/index'

export default function App() {
  return (
    <>
      <Routes />
    </>
  );
}