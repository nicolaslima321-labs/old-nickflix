// Import pages

import 'react-native-gesture-handler';
import * as React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import { createStackNavigator } from '@react-navigation/stack';

import Login from '../pages/Login'
import LogoTitle from '../components/LogoTitle'

const Stack = createStackNavigator();

function Routes() {
  return (
    <NavigationContainer>
      <Stack.Navigator headerMode="screen">
        <Stack.Screen
          name="Login"
          component= { Login }
          options= {{
            headerTitle: props => <LogoTitle {...props} />,
            headerStyle: {
              backgroundColor: '#000',
            },
          }}
        />
      </Stack.Navigator>
    </NavigationContainer>
  )
};

export default Routes;