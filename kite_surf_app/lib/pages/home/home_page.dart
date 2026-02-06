import 'package:flutter/material.dart';

class HomePage extends StatelessWidget {
  const HomePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text('Kite Surf App'),
      ),
      body: const Center(
        child: Text('Welcome to the Kite Surf App!'),
      ),
    );
  }
}