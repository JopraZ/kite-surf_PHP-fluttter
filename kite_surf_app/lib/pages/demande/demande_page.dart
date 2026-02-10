import 'package:flutter/material.dart';

class DemandePage extends StatelessWidget {
  const DemandePage({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: const Text('Demande de contact')),
      body: Padding(
        padding: const EdgeInsets.all(16),
        child: Column(
          children: const [
            TextField(decoration: InputDecoration(labelText: 'Nom')),
            TextField(decoration: InputDecoration(labelText: 'Email')),
            TextField(
              decoration: InputDecoration(labelText: 'Message'),
              maxLines: 6,
            ),
          ],
        ),
      ),
    );
  }
}
